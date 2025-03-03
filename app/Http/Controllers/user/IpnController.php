<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IpnController extends Controller
{
    public function ipn(Request $request)
    {

        try {

            // Validate request
            $validator = Validator::make($request->all(), [
                'event' => 'required|in:PAYIN,PAYOUT',
                'outTradeNo' => 'required',
                'transNo' => 'required',
                'transAmt' => 'required',
                'transStatus' => 'required|in:SUCCESS,FAIL'
            ]);
    
            // Validation Failed
            if ($validator->fails()) throw new \Exception(implode('...', $validator->errors()->all()));
            
            // Deposit Handle
            if(in_array($request->event, ['PAYIN']) && $request->transStatus == 'SUCCESS') {
                $updateData = self::updateDeposit($request->outTradeNo, $request->transAmt, $request->all());
            }

            // Payout Handle
            if(in_array($request->event, ['PAYOUT'])) {
                $updateData = self::updatePayout($request->transStatus, $request->outTradeNo, $request->transAmt, $request->all());
            }

            // Exception
            if($updateData instanceof \Exception) throw new \Exception($updateData->getMessage());

            /*$notify = ['success' => true, 'status' => 'ok', 'message'=>['success'=> 'Transaction was successful']];
            return response($notify, 200);*/
            return 'success';
        } catch (\Exception $th) {
            //throw $th;
            $notify = ['success' => true, 'status' => 'error', 'message'=>['error'=> $th->getMessage()]];
            return response($notify, 400);
        }

    }

    /**
     * Deposit update transaction
     */
    public static function updateDeposit(
        string $reference,
        string $amount,
        array $data
    ) {
        try {
            
            // Find Transaction
            $transaction = Deposit::where('order_id', $reference)->first();

            // Verify is transaction exisit
            if (!$transaction) throw new \Exception('Transaction not found');

            // Verify if transaction status not complete
            if (in_array($transaction->status, ['approved', 'rejected'])) throw new \Exception('Transaction was already complete');

            // Verify if transaction amount are the same
            //if ($transaction->amount != $amount) throw new \Exception('Transaction not the same as order its');
            
            
            // Update transaction details
            $transaction->status = 'approved';
            $transaction->transaction_id = $data['transNo'];
            $transaction->save();

            $user = User::find($transaction->user_id);

            // Update user balance
            $user->balance = $user->balance + $transaction->amount;
            $user->save();

            return $transaction;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Payout update transaction
     */
    public static function updatePayout(
        string $status,
        string $reference,
        string $amount,
        array $data
    ) {
        try {
            // Find payout
            $payout = Withdrawal::where('trx', $reference)->first();

            // Verify is payout exisit
            if (!$payout) throw new \Exception('Transaction not found');

            $user = User::find($payout->user_id);

            // Verify if payout status not complete
            if (in_array($payout->status, ['rejected'])) throw new \Exception('Transaction was already complete');
            
            // Verify successful status
            if(in_array($status, ['SUCCESS'])) {
                // Update payout
                $payout->status = 'approved';
                $payout->save();
            }

            // Verify failed status | Refund amount to user
            if(in_array($status, ['FAIL'])) {
                // Update payout
                $payout->status = 'rejected';
                $payout->save();

                // Refund amount to User Wallet
                $user->income = $user->income + $payout->amount;
                $user->save();
            }

            return $payout;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }
}
