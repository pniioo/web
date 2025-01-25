<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Package;
use App\Models\User;
use App\Models\Purchase;
use App\Models\UserLedger;
use Carbon\Carbon;

class CronController extends Controller
{
    //
    public function commission()
    {
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        
        $admin = Admin::first();

        if ($admin->salary_date == date('Y-m-d')) {
            return back()->with('error', 'Today Salary Served');
        }

        $nowDateTime = Carbon::now('Africa/Lagos');

        $purchases  = Purchase::where('status', 'active')
            ->where('next_return_date', '<=', $nowDateTime)
            ->whereDate("validity", ">=", $nowDateTime)
            ->get();

        foreach ($purchases as $purchase) {
            $user = User::where('id', $purchase->user_id)->first();
            if ($user) {
                $package = Package::where('id', $purchase->package_id)->first();
                if ($package) {
                    
                    $amount = $user->income + $purchase->daily_income;
                    $user->income = $amount;
                    $user->save();

                    $purchase->next_return_date = Carbon::now()->addHours(24);
                    $purchase->count_return += 1;
                    $purchase->save();

                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'daily_income';
                    $ledger->perticulation = $package->name . ' Package commission';
                    $ledger->amount = $purchase->daily_income;
                    $ledger->credit = $purchase->daily_income;
                    $ledger->type = 'income';
                    $ledger->status = 'approved';
                    $ledger->date = date("Y-m-d H:i:s");
                    $ledger->save();

                    $checkExpire = new Carbon($purchase->validity);
                    if ($checkExpire->isPast()) {
                        $ppp = Purchase::where('id', $purchase->id)->first();
                        $ppp->running_status = 'stop';
                        $ppp->status = 'inactive';
                        $ppp->save();
                    }

                    // Rebate
                }
            }
        }
    }
}








