<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\PaymentServices;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Deposit;
use App\Models\Purchase;
use App\Models\Setting;
use Carbon\Carbon;


class WithdrawController extends Controller
{
    public function withdraw()
    {
        if (\auth()->user()->gateway_method && \auth()->user()->gateway_address) {
            return view('app.main.withdraw.index');
        } else {
            return redirect()->route('user.bank')->with('success', 'First created bank account');
        }

    }

    public function withdrawRequest(Request $request, PaymentServices $payment)
    {
        $validate = Validator::make($request->all(), [
            'amount' => 'required|numeric',
        ]);

        if (true) {

        if ($validate->fails()) {
            return redirect()->back()->withErrors('errors', $validate->errors());
        }

        $user = User::find(\auth()->user()->id);
        $setting = Setting::first();

        //Check user payment or not
        /*$payments = Deposit::where('user_id', $user->id)->where('status', 'approved')->get();
        if ($payments->count() < 1) {
            return redirect()->back()->with('success', "You can't withdraw before deposit");
        }*/
        
        // Check if user has invest
        $invest1 = Purchase::where('user_id', $user->id)->first();
        if (!$invest1) {
            return redirect()->back()->with('error', "You need to invest before you withdraw");
        }

        // Verify Payment Method
        $paymenMethod = PaymentMethod::where('tag', $setting->auto_transfer_default)->first();

        if (!$paymenMethod) {
            return redirect()->back()->with('error', "You can't withdraw now, Payment method not available");
        }

        // Verify if Withdraw Allowed
        if ($setting->open_transfer != 1) {
            return redirect()->back()->with('error', "You can't withdraw now, Service not available. Try again later.");
        }

        $status_id = 'pending';
        $status_text = 'Withdraw under review it we take within 5 minutes or less';
        $reference = rand(00000,99999);

        if ($request->amount <= $user->income) {
            if ($request->amount >= setting('minimum_withdraw')) {
                if ($request->amount <= setting('maximum_withdraw')) {
                    $charge = 0;
                    if (setting('withdraw_charge') > 0) {
                        $charge = ($request->amount * setting('withdraw_charge')) / 100;
                    }

                    // Debit Wallet
                    $debit_wallet = debit_user_wallet($user->id, 2, 'NGN', $request->amount);

                        
                    if($debit_wallet['status'] == false){
                        return redirect()->back()->with('error', $debit_wallet['message']);
                    }

                    $finalAmount = $request->amount - $charge;

                    // Auto Payout
                    if($setting->auto_transfer) {

                        // Transfer Payment
                        $transferPayment = $payment->payout($reference, "NGN", $finalAmount, $setting->auto_transfer_default, $user->gateway_method, $user->gateway_address, $user->realname);

                        // Exception
                        if($transferPayment['status'] == false) {

                            // Refund Amount
                            credit_user_wallet($user->id, 2, 'NGN', $request->amount);

                            return redirect()->back()->with("error", $transferPayment['message']);
                            //return redirect()->back()->with("error", 'Payment failed due to bank network. Try again later');
                        }

                        $status_id = 'approved';
                        $status_text = 'Your withdraw request has been approved';
                    }

                    $account_info = [
                        'bank_account' => $user->gateway_address,
                        'full_name' => $user->realname,
                        'bank_name' => $user->bank_name,
                        'bank_code' => $user->gateway_method,
                    ];

                    $status_bank = $user->bank_name.' '.$user->gateway_address;

                    //Withdraw
                    $withdrawal = new Withdrawal();
                    $withdrawal->user_id = $user->id;
                    $withdrawal->method_name = $paymenMethod ? $paymenMethod->name : '---';
                    $withdrawal->trx = $reference;
                    $withdrawal->account_info = json_encode($account_info);
                    $withdrawal->number = $user->gateway_address;
                    $withdrawal->amount = $request->amount;
                    $withdrawal->currency = 'NGN';
                    $withdrawal->charge = $charge;
                    $withdrawal->oid = 'W-'.rand(000000,999999).rand(000000,999999).rand(000000,999999);
                    $withdrawal->final_amount = $finalAmount;
                    $withdrawal->status = $status_id;

                    //User Ledger
                    if ($withdrawal->save()) {
                        $ledger = new UserLedger();
                        $ledger->user_id = $user->id;
                        $ledger->reason = 'withdraw_request';
                        $ledger->perticulation = $status_bank;
                        $ledger->amount = $request->amount;
                        $ledger->debit = $request->amount - $charge;
                        $ledger->status = $status_id;
                        $ledger->date = date('d-m-Y H:i');
                        $ledger->save();
                    }
                    return redirect()->back()->with('success', $status_text);
                } else {
                    return redirect()->back()->with('success', 'Amount less then ' . setting('maximum_withdraw'));
                }
            } else {
                return redirect()->back()->with('success', 'Amount greater then ' . setting('minimum_withdraw'));
            }
        } else {
            return redirect()->back()->with('success', 'You don\'t have enough withdrawal balance to charge');
        }
        } else {
              return redirect()->back()->with('success', 'Withdraw time 10AM to 5PM');
        }

    }

    public function withdrawPreview()
    {
        $withdraws = Withdrawal::with('payment_method')->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.withdraw.withdraw-preview', compact('withdraws'));
    }
}
