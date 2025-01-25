<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class MiningController extends Controller
{
    public function running_mining()
    {
        return view('app.main.order.order');
    }

    public function start_mining($pack_id){
        $parchase = Purchase::where('package_id', $pack_id)->where('user_id', \auth()->id())->where('status', 'active')->orderByDesc('id')->first();
        if ($parchase){
            $parchase->running_status = 'running';
            $parchase->save();
        }
        return back();
    }


    public function received_amount()
    {
        $user = Auth::user();
        if ($user->receive_able_amount > 0){
            User::where('id', $user->id)->update([
                'income'=> $user->receive_able_amount + $user->income,
                'receive_able_amount'=> 0
            ]);
            return back()->with('success', 'Amount received');
        }else{
            return back()->with('error', 'Amount empty');
        }
    }

    public function process()
    {
        return view('app.main.order.process');
    }
}








