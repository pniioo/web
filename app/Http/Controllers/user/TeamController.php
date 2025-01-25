<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Checkin;
use App\Models\Commission;
use App\Models\Deposit;
use App\Models\Improvment;
use App\Models\LuckyLedger;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    //
    public function team(){
        $user = Auth::user();

        //First Level Users
        $first_level_users = User::where('ref_by', $user->ref_id)->get();
        $first_level_users_ids = [];
        foreach ($first_level_users as $user){
            array_push($first_level_users_ids, $user->id);
        }

        //Second Level Users
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Third Level Users
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();
        $team_size = $first_level_users->count() + $second_level_users->count() + $third_level_users->count();

        //Get level wise user ids
        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third

        $lv1Recharge = Deposit::whereIn('user_id', $first_ids)->where('status', 'approved')->sum('amount');
        $lv2Recharge = Deposit::whereIn('user_id', $second_ids)->where('status', 'approved')->sum('amount');
        $lv3Recharge = Deposit::whereIn('user_id', $third_ids)->where('status', 'approved')->sum('amount');
        $lvTotalDeposit = $lv1Recharge + $lv2Recharge + $lv3Recharge;

        $lv1Withdraw = Withdrawal::whereIn('user_id', $first_ids)->where('status', 'approved')->sum('amount');
        $lv2Withdraw = Withdrawal::whereIn('user_id', $second_ids)->where('status', 'approved')->sum('amount');
        $lv3Withdraw = Withdrawal::whereIn('user_id', $third_ids)->where('status', 'approved')->sum('amount');
        $lvTotalWithdraw = $lv1Withdraw + $lv2Withdraw + $lv3Withdraw;

        return view('app.main.team.index', compact(
            'first_level_users',
            'second_level_users',
            'third_level_users',
            'team_size',
            'lvTotalDeposit',
            'lvTotalWithdraw',
            'lv1Recharge',
            'lv2Recharge',
            'lv3Recharge',
            'lv1Withdraw',
            'lv2Withdraw',
            'lv3Withdraw',
        ));
    }

    public function get_recharge_amount($step)
    {
        $user = Auth::user();
        if ($step == 'com1'){
            User::where('id', $user->id)
                ->update([
                    'balance'=> $user->balance + $user->recharge_1_com,
                    'commission_balance'=> $user->commission_balance + $user->recharge_1_com,
                    'received_balance1' => $user->received_balance1 + $user->recharge_1_com,
                    'recharge_1_com'=> 0,
                ]);
        }
        if ($step == 'com2'){
            User::where('id', $user->id)
                ->update([
                    'balance'=> $user->balance + $user->recharge_2_com,
                    'commission_balance'=> $user->commission_balance + $user->recharge_2_com,
                    'received_balance2' => $user->received_balance2 + $user->recharge_2_com,
                    'recharge_2_com'=> 0,
                ]);
        }
        if ($step == 'com3'){
            User::where('id', $user->id)
                ->update([
                    'balance'=> $user->balance + $user->recharge_3_com,
                    'commission_balance'=> $user->commission_balance + $user->recharge_3_com,
                    'received_balance3' => $user->received_balance3 + $user->recharge_3_com,
                    'recharge_3_com'=> 0,
                ]);
        }
        return redirect()->route('team')->with('message', 'Congratulations. Amount Received');
    }


    public function user_details($step)
    {
        $user = Auth::user();

        //First Level Users
        $first_level_users = User::where('ref_by', $user->ref_id)->get();
        $first_level_users_ids = [];
        foreach ($first_level_users as $user){
            array_push($first_level_users_ids, $user->id);
        }

        //Second Level Users
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Third Level Users
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();

        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third

        if ($step){
            if ($step == '1'){
                $users = User::whereIn('id', $first_ids)->get();
            }elseif ($step == '2'){
                $users = User::whereIn('id', $second_ids)->get();
            }elseif ($step == '3'){
                $users = User::whereIn('id', $third_ids)->get();
            }else{
                return back();
            }
        }else{
            return back();
        }
        return  view('app.main.team.list', compact('users', 'step'));
    }


    public function income()
    {
        return  view('app.main.income');
    }


    public function lvl_details($ids, $lvl)
    {
        $ids = decrypt($ids);
        $users = User::whereIn('id', $ids)->get();

        //total commission
        $sponsorCom = UserLedger::where('user_id', Auth::id())->where('reason', 'sponsor_bonus')->get()->pluck('amount')->sum();
        $referralCom = UserLedger::where('user_id', Auth::id())->where('reason', 'refer_bonus')->get()->pluck('amount')->sum();
//        $getTotalCommission = $getTotalCommission1 + $getTotalCommission2;

        //Total payment
        $total_payment_amount = Deposit::whereIn('user_id', $ids)->get()->pluck('amount')->toArray();
        $total_payment = array_sum($total_payment_amount);

        return  view('app.main.team.list', compact('users', 'lvl', 'total_payment', 'sponsorCom', 'referralCom'));
    }

}
