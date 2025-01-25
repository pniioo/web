<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\PaymentServices;
use App\Models\BankList;
use App\Models\BonusLedger;
use App\Models\Checkin;
use App\Models\Commission;
use App\Models\Deposit;
use App\Models\Fund;
use App\Models\Improvment;
use App\Models\Mining;
use App\Models\Notice;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\VipSlider;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function dashboard()
    {
        $sliders = VipSlider::where('page_type', 'home_page')->where('status', 'active')->get();
        return view('app.main.index', compact('sliders'));
    }

    public function vip()
    {
        $sliders = VipSlider::where('page_type', 'vip_page')->where('status', 'active')->get();
        $vips = Package::where('status', 'active')->get();
        $vids = my_vips();
        return view('app.main.vip', compact('sliders', 'vips', 'vids'));
    }

    public function package_details($id)
    {
        $package = Package::find($id);
        return view('app.main.package_details', compact('package'));
    }

    public function profile()
    {
        return view('app.main.profile');
    }
 public function allrecord()
    {
        return view('app.main.allrecord');
    }

    public function team()
    {
        return view('app.main.team.index');
    }

    public function mine()
    {
        $improvements = Improvment::where('status', 'active')->orderBy('amount_limit')->get();

        //Get big row from improvements
        $largest_improvement_id = 0;
        foreach ($improvements as $element){ //Invest amount wise amount commission
            if (user()->invest_balance >= $element->amount_limit){
                $largest_improvement_id = $element->id;
            }
        }

        $initial_improvement = Improvment::where('id', $largest_improvement_id)->first();
        return view('app.main.mine.mine', compact('initial_improvement'));
    }

    public function setting()
    {
        return view('app.main.mine.setting');
    }

    public function transaction_password()
    {
        return view('app.main.mine.transaction_password');
    }

    public function login_password()
    {
        return view('app.main.mine.login_password');
    }

    public function service()
    {
        return view('app.main.mine.service');
    }

    public function guide()
    {
        return view('app.main.mine.guide');
    }

    public function recharge()
    {
        return view('app.main.deposit.index');
    }

    public function recharge_confirm($amount, $method, PaymentServices $payment)
    {

        $setting = Setting::first();

        $payment_method = PaymentMethod::where(['id' => $method, 'status' => 'active'])->inRandomOrder()->first();
        if (!$payment_method){
            return back()->with('error', 'Method not available.');
        }

        // Verify if Recharge Allowed
        if ($setting->open_deposit != 1) {
            return redirect()->back()->with('error', "You can't Recharge your wallet now, Service not available. Try again later.");
        }

        $jsonData = '';
        $linkData = '';
        $reference = rand(00000,99999);

        // Auto Deposit
        if($payment_method->auto && $setting->auto_deposit) {
            // Charge Payment
            $chargePayment = $payment->charge($reference, 'NGN', $amount, $payment_method->tag);

            // Exception
            if($chargePayment['status'] == false) {
                return back()->with("error", $chargePayment['message']);
            }

            $jsonData = json_encode([
                'reference' => $chargePayment['data']['reference'],
                'order_ref' => $chargePayment['data']['order_ref']
            ]);
            
            $linkData = $chargePayment['data']['link'];

            $model = new Deposit();
            $model->user_id = Auth::id();
            $model->method_name = $payment_method->name;
            $model->order_id = $reference;
            $model->transaction_id = $chargePayment['data']['order_ref'];
            $model->amount = $amount;
            $model->final_amount = $amount;
            $model->pay_link = $linkData;
            $model->data = $jsonData;
            $model->date = date('d-m-Y H:i:s');
            $model->status = 'pending';
            $model->save();

            return redirect()->away($linkData);
        }

        return view('app.main.deposit.recharge_confirm', compact('amount', 'payment_method'));
    }

    public function recharge_confirm_submit(Request $request)
    {
        $paymentMM = PaymentMethod::find($request->paymethod);
        $model = new Deposit();
        $model->user_id = Auth::id();
        $model->method_name = $paymentMM->name;
        $model->order_id = rand(0000,9999).rand(0000,9999);
        $model->transaction_id = $request->transaction_id;
        $model->amount = $request->amount;
        $model->charge_amount = 0;
        $model->oid = 'D-'.rand(000000,999999).rand(000000,999999).rand(000000,999999);
        $model->final_amount = $request->amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';
        $model->save();

        //Create user ledger
        $ledger = new UserLedger();
        $ledger->user_id = Auth::id();
        $ledger->reason = 'user_deposit';
        $ledger->perticulation = 'user deposit using onepay';
        $ledger->amount = $request->amount;
        $ledger->debit = $request->amount;
        $ledger->status = 'pending';
        $ledger->date = date('y-m-d');
        $ledger->save();
        return view('app.main.deposit.success');
        return back()->with('success', 'Deposit Successfully sent..');
    }

    public function usdt()
    {
        return view('app.main.deposit.usdt');
    }

    public function income()
    {
        return view('app.main.mine.income');
    }

    public function push()
    {
        return view('app.main.mine.push');
    }

    public function progress()
    {
        return view('app.main.mine.progress');
    }

    public function usdt_recharge(Request $request)
    {
        $rate = setting('rate');
        $usdt = $request->usdt;

        $model = new Deposit();
        $model->user_id = Auth::id();
        $model->method_name = 'usdt';
        $model->order_id = 'S'.rand(00000000,99999999).time();
        $model->transaction_id = 'usdt';
        $model->usdt = $usdt;
        $model->amount = $usdt * $rate;
        $model->final_amount = $usdt * $rate;
        $model->date = Carbon::now();
        $model->status = 'pending';
        $model->save();
        return redirect()->route('usdt')->with('message', 'USDT Recharge Success');
    }


    public function reword()
    {
        $i = Auth::user();

        $refer_users = User::where('ref_by', $i->ref_id)->get();

        //Check first time my users purchase any vip
        $amount = 0;
        if ($i->first_time_bonus != 1) {
            foreach ($refer_users as $user) {
                $purchase = Purchase::where('user_id', $user->id)->first();
                if ($purchase) {
                    $vip = Package::find($purchase->id);
                    $amount = ($vip->price * $vip->sponsor) / 100;
                }
            }
        }

        return view('app.main.reword.index', compact('refer_users', 'amount'));
    }

    public function history()
    {
        $recharges = Deposit::where('user_id', Auth::id())->orderByDesc('id')->get();
        $withdraws = Withdrawal::where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.history.history', compact('recharges', 'withdraws'));
    }

    public function update_profile(Request $request)
    {
        $user = User::find(Auth::id());
        $path = uploadImage(false, $request, 'photo', 'upload/profile/', 200, 200, $user->photo);
        $user->photo = $path ?? $user->photo;

        $user->update();
        return redirect()->route('my.profile')->with('success', 'Successfully updated your profile photo');
    }

    public function personal_details()
    {
        return view('app.main.update_personal_details');
    }

    public function bonus_ledger()
    {
        $datas = BonusLedger::with(['bonus', 'user'])->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.bonus.bonus-preview', compact('datas'));
    }

    public function payment_ledger()
    {
        $payments = Deposit::where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.recharge.payment-preview', compact('payments'));
    }

    public function withdraw_ledger()
    {
        $withdraws = Withdrawal::with('payment_method')->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.withdraw.withdraw-preview', compact('withdraws'));
    }


    public function notice()
    {
        $datas = Notice::where('status', 'active')->orderByDesc('id')->get();
        return view('app.main.notice', compact('datas'));
    }


    public function card()
    {
        $methods = PaymentMethod::where('status', 'active')->where('id', '!=', 4)->get();

        return view('app.main.gateway_setup', compact('methods'));
    }

    public function setupGatewayView(Request $request)
    {
        if ($request->gateway_method && $request->gateway_number) {
            User::where('id', Auth::id())->update([
                'gateway_method' => $request->gateway_method,
                'gateway_number' => $request->gateway_number,
            ]);
            return redirect()->route('user.card')->with('success', 'Successful.... updated your bank information');
        } else {
            return redirect()->route('user.card')->with('error', 'Something went wrong.');
        }
    }


    public function setupGateway(Request $request)
    {
        $code = session()->get('code');
        if ($code != null) {
            if ($request->code == $code) {
                User::where('id', Auth::id())->update([
                    'gateway_method' => $request->gateway_method,
                    'gateway_number' => $request->gateway_number,
                ]);
                return redirect()->route('user.card')->with('success', 'Successful....');
            } else {
                return redirect()->route('user.card')->with('error', 'Verification dode does not match.');
            }
        } else {
            return redirect()->route('user.card')->with('error', 'something went wrong...');
        }
    }

    public function invite()
    {
        return view('app.main.invite');
    }

    public function help_center()
    {
        return view('app.main.help_center');
    }

    public function add_bank()
    {
        return view('app.main.bank.index');
    }

    public function add_bank_setup()
    {
        return view('app.main.bank.index_setup');
    }

    public function company()
    {
        return view('app.main.company');
    }

    public function announcement()
    {
        return view('app.main.announcement');
    }

    public function rules()
    {
        return view('app.main.rules');
    }

    public function add_bank_setup_confirm(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'realname' => 'required',
            'gateway_method' => 'required',
            'gateway_address' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('user.bank')->withErrors($validate->errors());
        }

        // Find Bank
        $bank = BankList::where('bank_code', $request->gateway_method)->first();

        // Not Exist
        if(!$bank) {
            //
            return redirect()->route('user.bank')->with('error', 'Selected Bank not found');
        }

        $user = User::find(Auth::id());

        $user->realname = $request->realname;
        $user->gateway_address = $request->gateway_address;
        $user->gateway_method = $request->gateway_method;
        $user->bank_name = $bank->name;
        $user->update();
        return redirect()->route('user.bank')->with('success', 'Successfully update account');
    }

    public function delete_bank_acc()
    {
        $user = User::find(Auth::id());
        $user->bank_name = null;
        $user->gateway_number = null;
        $user->gateway_method = null;
        $user->update();
        return redirect()->route('user.bank')->with('success', 'Bank account delete successfully please created new again.');
    }


    //update user name
    public function update_name(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->update();
        return redirect()->route('setting')->with('success', 'Name changed success');
    }

    public function setting_acc_number_bkash(Request $request)
    {
        $user = User::find(Auth::id());
        $user->bkash = $request->bkash;
        $user->update();
        return redirect()->route('setting')->with('success', 'bKash number changed success');
    }

    public function setting_acc_number_nagad(Request $request)
    {
        $user = User::find(Auth::id());
        $user->nagad = $request->nagad;
        $user->update();
        return redirect()->route('setting')->with('success', 'Nagad number changed success');
    }

    public function setting_acc_number_usdt(Request $request)
    {
        $user = User::find(Auth::id());
        $user->usdt = $request->usdt;
        $user->update();
        return redirect()->route('setting')->with('success', 'USDT number changed success');
    }

    public function setting_withdraw_password(Request $request)
    {
        $user = User::find(Auth::id());
        $user->w_password = $request->wpass;
        $user->update();
        return redirect()->route('setting')->with('success', 'Withdraw password changed success');
    }

    public function setting_change_password(Request $request)
    {
        //Check current password
        $user = User::find(Auth::id());
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->new_password == $request->confirm_password) {
                $user->password = Hash::make($request->new_password);
                $user->update();
                return redirect()->route('login_password')->with('success', 'Password changed successful.');
            } else {
                return redirect()->route('login_password')->with('success', 'New password and confirm password does not match.');
            }
        } else {
            return redirect()->route('login_password')->with('success', 'Current password does not match');
        }
    }

    public function record($type = null)
    {
        return view('app.main.record', compact('type'));
    }


    public function confirm_submit(Request $request)
    {
        $data = $request->all();
        $model = new Deposit();
        $model->user_id = $data['ui'];
        $model->method_name = $data['pm'];
        $model->method_number = '01000000000';
        $model->order_id = $data['oid'];
        $model->transaction_id = $data['tid'];
        $model->number = $data['aca'];
        $model->amount = $data['amount'];
        $model->final_amount = $data['amount'];
        $model->usdt = $data['amount'] / setting('rate');
        $model->date = Carbon::now();
        $model->status = 'pending';
        $model->save();
        return response()->json(['status'=>true, 'data'=> $data]);
    }

    public function download_apk(){
        $file= public_path('ktm.apk');
        return response()->file($file ,[
            'Content-Type'=>'application/vnd.android.package-archive',
            'Content-Disposition'=> 'attachment; filename="ktm.apk"',
        ]) ;
    }


    public function chat()
    {
        return view('app.main.order.order');
    }
}







