<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\BonusLedger;
use App\Models\Checkin;
use App\Models\Mining;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\User;
use App\Models\UserLedger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GetBonusController extends Controller
{
    //
    public function index()
    {
        $data = Bonus::where('status', 'active')->first();
        return view('app.main.bonus.index', compact('data'));
    }

    public function gift()
    {
        return view('app.main.gift.index');
    }

    public function submitBonusCode(Request $request)
    {
        Validator::make($request->all(), [
            'bonus_code' => 'required'
        ]);

        $code = $request->bonus_code;
        $bonus = Bonus::where('status', 'active')->first();
        $user = Auth::user();
        if ($bonus) {
            if ($code == $bonus->code) {
                //Check this bonus use this user.
                $checkBonusUses = BonusLedger::where('bonus_id',$bonus->id )->where('user_id', $user->id)->first();
                if ($checkBonusUses){
                    return response()->json(['status' => false, 'message' => 'You are already use this bonus code.']);
                }

                if ($bonus->counter < $bonus->set_service_counter) {
                    User::where('id', $user->id)->update([
                        'income'=> $user->income + $bonus->amount
                    ]);

                    //User Ledger
                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'get_bonus';
                    $ledger->perticulation = 'Congratulations '.$user->name. ' you are successfully get your bonus.';
                    $ledger->amount = $bonus->amount;
                    $ledger->debit = $bonus->amount;
                    $ledger->status = 'approved';
                    $ledger->date = date('d-m-Y H:i');
                    $ledger->save();

                    Bonus::where('id', $bonus->id)->update([
                        'counter'=> $bonus->counter + 1
                    ]);

                    $bonus_ledger = new BonusLedger();
                    $bonus_ledger->user_id = $user->id;
                    $bonus_ledger->bonus_id = $bonus->id;
                    $bonus_ledger->bonus_code = $request->bonus_code;
                    $bonus_ledger->save();

                    return response()->json(['status' => true, 'message' => 'Congratulations Received '.price($bonus->amount)]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Bonus fulfil']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Bonus code invalid.']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Bonus not available.']);
        }
    }

    public function preview()
    {
        $datas = BonusLedger::with(['bonus', 'user'])->where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.bonus.bonus-preview', compact('datas'));
    }

    public function get_bonus_vip(Request $request)
    {
        $user = Auth::user();
        $refer_users = User::where('ref_by', Auth::user()->ref_id)->get();
        if ($refer_users->count() < 30){
            return response()->json(['status'=> false, 'message'=> 'Need more refer']);
        }

        $bonus_vip = Package::whereNotNull('bonus_vip_id')->first();
        if ($bonus_vip){

            $package = Package::find($bonus_vip->id);
            $user = Auth::user();

            //Purchase Table Create
            $purchase = new Purchase();
            $purchase->user_id = Auth::id();
            $purchase->package_id = $package->id;
            $purchase->amount = $package->price;
            $purchase->hours = $package->hours;
            $purchase->date = date('d-m-Y H:i');
            $purchase->status = 'active';
            $purchase->save();

            //Create Ledger
            $ledger = new UserLedger();
            $ledger->user_id = $user->id;
            $ledger->reason = 'bonus_vip';
            $ledger->perticulation = 'This is bonus vip';
            $ledger->amount = $package->price;
            $ledger->credit = $package->price;
            $ledger->status = 'approved';
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            //Create mining info
            $mining = new Mining();
            $mining->user_id = $user->id;
            $mining->package_id = $package->id;
            $mining->purchase_id = $purchase->id;
            $mining->running_start_date = Carbon::now();
            $mining->running_end_date = Carbon::now()->addDays($package->validity);
            $mining->total_time = $package->validity * 24; // total hour
            $mining->continue_date_time = Carbon::now();
            $mining->amount_24_hour = $package->commission_with_avg_amount != 0 ? $package->commission_with_avg_amount / $package->validity : 0;
            $mining->counter_24_hour = $package->validity;
            $mining->running_status = 'start';
            $mining->amount_status = 'false';
            $mining->save();

            User::where('id', $user->id)->update(['bonus_vip'=> '1']);

            return response()->json(['status'=> true, 'message'=> "Congratulations ".Auth::user()->name ?? Auth::user()->username .". VIP purchase successful."]);

        }else{
            return response()->json(['status'=> false, 'message'=> 'Bonus vip not available.']);
        }
    }

    public function checkin(Request $request)
    {
        // check this user already check it
        $check = Checkin::where('user_id', Auth::user()->id)->orderByDesc('id')->first();
        if ($check){
            //check submit today
            $todayCheck = new Carbon($check->date);
            if ($todayCheck->isToday()){
                return response()->json(['status'=> false, 'message'=> 'Already Check in']);
            }
        }

        //Create checkin record
        $model = new Checkin();
        $model->user_id = Auth::id();
        $model->date = Carbon::now();
        $model->amount = setting('checkin_bonus');
        $model->save();

        //Added balance in user account
        User::where('id', Auth::user()->id)->update([
            'income'=> Auth::user()->income + setting('checkin_bonus'),
            'commission_balance'=> Auth::user()->commission_balance + setting('checkin_bonus'),
        ]);

        return response()->json(['status'=> true, 'message'=> 'Congratulations get daily checkin bonus']);
    }

    public function checkin_ledger()
    {
        $checkins = Checkin::where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.checkin-ledger', compact('checkins'));
    }
}
