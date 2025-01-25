<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OnepayController extends Controller
{
    public function index()
    {
        //Return deposit in user dashboard method
        return view('app.main.deposit.index');
    }


    public function usdt_deposit(Request $request){
        $model = new Deposit();

        $path = uploadImage(false ,$request, 'photo', 'upload/usdt/', 200, 200 ,$model->photo);
        $model->user_id = Auth::id();
        $model->method_name = 'usdt';
        $model->order_id = rand(00000000,99999999);
        $model->transaction_id = $request->transaction_id;
        $model->number = 0;
        $model->photo = $path ?? $model->photo;
        $model->amount = $request->usdt_amount;
        $model->charge_amount = 0;
        $model->final_amount = $request->usdt_amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';
        $model->save();
        return redirect()->back()->with('success_usdt', 'Successful..');
    }

    public function amounviewer($amount)
    {
        $methods = PaymentMethod::where('status', 'active')->get();
        return view('app.main.recharge.onepay-method', compact('amount', 'methods'));
    }

    public function onepaytimeout()
    {
        return view('app.main.recharge.timeout');
    }

    public function onepaydetails()
    {
        $data = session()->get('onepay');
        if ($data['pay_method'] == 4){
            return view('app.main.recharge.order_cencle');
        }
        $method = PaymentMethod::where('id', $data['pay_method'])->first();
        return view('app.main.recharge.onepaydetail', compact('data', 'method'));
    }

    public function onepaysubmit(Request $request)
    {
        $data = $request->all();
        session()->put('onepay', $data);
        return response()->json(['status'=> true]);
    }

    public function onePaydepositSubmit(Request $request)
    {
        $validate = Validator::make($request->all(), [
           'acc_acount' => 'required|numeric',
           'amount' => 'required|numeric',
            'oid' => 'required',
            'pay_method'=> 'required',
            'transaction_id'=> 'required'
        ], [
            'acc_acount.required'=> 'Account number mismatch',
            'oid.required'=> 'Order Id mismatch',
            'pay_method.required'=> "you can't select Payment method",
        ]);
        if ($validate->fails()){
            return back()->withErrors($validate->errors());
        }

        $method = PaymentMethod::find($request->pay_method);
        if ($method->minimum_recharge > 0 && $request->amount < $method->minimum_recharge){
            return "Recharge amount must be greater then ".$method->minimum_recharge;
        }
        if ($method->maximum_recharge > 0 && $request->amount > $method->maximum_recharge){
            return "Recharge amount must be less then ".$method->maximum_recharge;
        }

        $final_amount = 0;
        if ($method->recharge_charge > 0){
            $final_amount = ($method->recharge_charge * $request->amount) / 100;
        }

        $model = new Deposit();
        $model->user_id = Auth::id();
        $model->method_name = $method->name;
        $model->method_number = $method->number;
        $model->order_id = $request->oid;
        $model->transaction_id = $request->transaction_id;
        $model->number = $request->acc_acount;
        $model->amount = $request->amount;
        $model->charge_amount = $final_amount;
        $model->final_amount = $request->amount - $final_amount;
        $model->date = date('d-m-Y H:i:s');
        $model->status = 'pending';

        if ($model->save())
        {
            if (session()->has('onepay')){
                $data = [
                    'user_id'=> $model->user_id,
                    'order_id'=> $model->order_id,
                    'transaction_id'=> $model->transaction_id,
                    'number'=> $model->number,
                    'amount'=> $model->amount,
                    'charge_amount'=> $final_amount,
                    'final_amount'=> $request->amount - $final_amount,
                    'status'=> $model->status,
                ];
                session()->put('onepay', $data);
            }
            return response()->json(['status'=> true]);
        }
    }

    public function onepayDepositSuccess()
    {
        if (session()->has('onepay')){
            $data = session()->get('onepay');
        }else{
            $data = [];
        }
        return view('app.main.recharge.success', compact('data'));
    }

}
