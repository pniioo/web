<?php

namespace App\Http\Controllers\user;

use App\Models\Fund;
use App\Models\FundInvest;
use App\Models\User;
use App\Models\UserLedger;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFundInvestController extends Model
{
    use HasFactory;

    public function my_fund()
    {
        $fundInvests = FundInvest::with('fund')
            ->where('status', 'active')
            ->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.fund.my-fund', compact('fundInvests'));
    }

    public function fund()
    {
        $funds = Fund::get();
        $congratulation = false;

        //My funds
        $myFunds = FundInvest::where('user_id', Auth::id())
            ->where('status', 'active')->get();

        foreach ($myFunds as $fund)
        {
            //initial expired date
            $fund_invest_date = new Carbon($fund->validity_expired);
            if ($fund_invest_date->isPast() && $fund->status == 'active'){
                //get expired invest fund

                $expired_invest_fund = FundInvest::with(['fund', 'user'])->find($fund->id);

                //get amount with commission
                $commission = ($expired_invest_fund->fund->price * $expired_invest_fund->fund->commission) / 100;

                $calculate_total_amount = $commission + $expired_invest_fund->fund->price;

                //Added balance in user
                User::where('id', $expired_invest_fund->user->id)->update([
                    'balance'=> $expired_invest_fund->user->balance + $calculate_total_amount
                ]);

                FundInvest::where('id', $expired_invest_fund->id)->update([
                    'status'=> 'inactive'
                ]);

                //Create user ledger
                $ledger = new UserLedger();
                $ledger->user_id = $expired_invest_fund->user->id;
                $ledger->reason = 'fund_income';
                $ledger->perticulation = 'Congratulation. you are already received fund invest income';
                $ledger->amount = $calculate_total_amount;
                $ledger->debit = $calculate_total_amount;
                $ledger->status = 'approved';
                $ledger->date = date('y-m-d');
                $ledger->save();

                $congratulation = true;
            }
        }

        return view('app.main.fund.fund', compact('funds', 'congratulation'));
    }

    public function fund_confirmation(Request $request ,$id)
    {
        $fund = Fund::find($id);

        if (!$request->has('fund_amount')){
            return redirect()->route('fund')->with('message', 'Please enter fund amount');
        }
        //check fund status
        if ($fund->status == 'upcoming'){
            return redirect()->route('fund')->with('message', 'Fund is upcoming.');
        }

        if ((int)$request->fund_amount < $fund->minimum_invest){
            return redirect()->route('fund')->with('message', "Please enter $fund->minimum_invest grated then minimum amount");
        }

        $user = Auth::user();

        if ($user->balance >= (int)$request->fund_amount){

            //User balance update
            User::where('id', $user->id)->update(['balance'=> $user->balance - (int)$request->fund_amount]);

            //Insert new record into fundInvest for purchase
            $model = new FundInvest();
            $model->user_id = Auth::id();
            $model->fund_id = $fund->id;
            $model->validity_expired = Carbon::now()->addDays($fund->validity);
            $model->price = (int)$request->fund_amount;
            $model->status = 'active';
            $model->save();

            //Create a ledger
            $ledger = new UserLedger();
            $ledger->user_id = Auth::id();
            $ledger->reason = 'invest_fund';
            $ledger->perticulation = 'Congratulations '.$user->name. ' Your fund invest successfully done.';
            $ledger->amount = (int)$request->fund_amount;
            $ledger->date = Carbon::now();
            $ledger->save();
            return redirect()->route('fund')->with('message', 'Fund invest successful.');
        }else{
            return redirect()->route('fund')->with('message', 'Sufficient balance too low.');
        }
    }
}
