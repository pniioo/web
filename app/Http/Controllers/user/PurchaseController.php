<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\Mining;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\User;
use App\Models\UserLedger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchaseConfirmation($id)
    {
        $package = Package::find($id);
        $user = Auth::user();

        //Check status
        if ($package->status != 'active')
        {
            return back()->with('error', $package->name." inactivate.");
        }

        if ($package){
            if ($package->price <= $user->balance){
                User::where('id', $user->id)->update([
                    'balance'=> $user->balance - $package->price,
                ]);

                //Purchase Table Create
                $purchase = new Purchase();
                $purchase->user_id = Auth::id();
                $purchase->package_id = $package->id;
                $purchase->amount = $package->price;
                $purchase->daily_income = $package->commission_with_avg_amount / $package->validity;
                $purchase->date = date('d-m-Y H:i');
                $purchase->validity = Carbon::now()->addDays($package->validity);
                $purchase->next_return_date = Carbon::now()->addHours(24);
                $purchase->total_return = $package->validity;
                $purchase->running_status = 'running';
                $purchase->status = 'active';
                $purchase->save();

                //Create Ledger
                $ledger = new UserLedger();
                $ledger->user_id = $user->id;
                $ledger->reason = 'vip_purchase';
                $ledger->perticulation = 'Your vip purchase successfully. thank you';
                $ledger->amount = $package->price;
                $ledger->credit = $package->price;
                $ledger->status = 'approved';
                $ledger->date = date("Y-m-d H:i:s");
                $ledger->save();

                $first_ref = User::where('ref_id', Auth::user()->ref_by)->first();
                if ($first_ref){
                    $amount = $package->price * setting('first_refer_commission') / 100;
                    User::where('id', $first_ref->id)->update([
                        'income' => $first_ref->income + $amount
                    ]);

                    $ledger = new UserLedger();
                    $ledger->user_id = $first_ref->id;
                    $ledger->get_balance_from_user_id = $user->id;
                    $ledger->reason = 'refer_bonus';
                    $ledger->perticulation = 'Congratulations';
                    $ledger->amount = $amount;
                    $ledger->debit = $amount;
                    $ledger->status = 'approved';
                    $ledger->step = 'first';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();

                    $second_ref = User::where('ref_id', $first_ref->ref_by)->first();
                    if ($second_ref){
                        $amount = $package->price * setting('second_refer_commission') / 100;
                        User::where('id', $second_ref->id)->update([
                            'income' => $second_ref->income + $amount
                        ]);

                        $ledger = new UserLedger();
                        $ledger->user_id = $second_ref->id;
                        $ledger->get_balance_from_user_id = $user->id;
                        $ledger->reason = 'refer_bonus';
                        $ledger->perticulation = 'Congratulations. you have received refer income from '.$user->name ?? $user->username;
                        $ledger->amount = $amount;
                        $ledger->debit = $amount;
                        $ledger->status = 'approved';
                        $ledger->step = 'second';
                        $ledger->date = date('d-m-Y H:i');
                        $ledger->save();


                        $third_ref = User::where('ref_id', $second_ref->ref_by)->first();
                        if ($third_ref){
                            $amount = $package->price * setting('third_refer_commission') / 100;
                            User::where('id', $third_ref->id)->update([
                                'income' => $third_ref->income + $amount
                            ]);

                            $ledger = new UserLedger();
                            $ledger->user_id = $third_ref->id;
                            $ledger->get_balance_from_user_id = $user->id;
                            $ledger->reason = 'refer_bonus';
                            $ledger->perticulation = 'Congratulations. you have received refer income from '.$user->name ?? $user->username;
                            $ledger->amount = $amount;
                            $ledger->debit = $amount;
                            $ledger->status = 'approved';
                            $ledger->step = 'third';
                            $ledger->date = date('d-m-Y H:i');
                            $ledger->save();
                        }
                    }
                }

                return redirect()->route('dashboard')->with('success', "Congratulations purchase success");
            }else{
                return back()->with('error', "Your sufficient balance is low.");
            }
        }else{
            return back()->with('error', "VIP Not found");
        }
    }


    public function vip_confirm($vip_id)
    {
        $vip = Package::find($vip_id);
        return view('app.main.vip_confirm', compact('vip'));
    }

    protected function ref_user($ref_by)
    {
        return User::where('ref_id', $ref_by)->first();
    }
}
