<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\BonusLedger;
use App\Models\User;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SpinController extends Controller
{
    public function spin()
    {
        return view('app.main.spin.index');
    }

    public function submitspin(Request $request)
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
                    return response()->json(['status' => false, 'message' => 'Already use.']);
                }
                if ($bonus->counter < $bonus->set_service_counter) {
                    return response()->json(['status' => true, 'message' => 'Congratulations. Start Spin' ]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Our targeted member fulfil.']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Code invalid.']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Not available.']);
        }
    }



    public function submitspinamount(Request $request)
    {
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

                $amount = $request->amount;

                if ($bonus->counter < $bonus->set_service_counter) {
                    User::where('id', $user->id)->update([
                        'balance'=> $user->balance + $amount,
                        'commission_balance'=> $user->commission_balance + $amount
                    ]);

                    //User Ledger
                    $ledger = new UserLedger();
                    $ledger->user_id = $user->id;
                    $ledger->reason = 'get_bonus';
                    $ledger->perticulation = 'Congratulations '.$user->name. ' you are successfully get your bonus.';
                    $ledger->amount = $amount;
                    $ledger->debit = $amount;
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
                    $bonus_ledger->amount = $amount;
                    $bonus_ledger->save();

                    return response()->json(['status' => true, 'message' => 'Congratulations. get '.$amount ]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Targeted member fulfil.']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Code invalid.']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Not available.']);
        }
    }

    public function spin_result()
    {
        $spins = BonusLedger::where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('app.main.spin.ledger', compact('spins'));
    }
}
