<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public $route = 'admin.setting';
    public function index()
    {
        $data = Setting::find(1);
        return view('admin.pages.setting.index', compact('data'));
    }

    public function insert_or_update(Request $request)
    {
        $this->validate($request,[
            'site_name'=> 'required',
        ]);
        $model = Setting::findOrFail(1);
        $model->site_name = $request->site_name;
        $model->withdraw_charge = $request->withdraw_charge;
        $model->minimum_withdraw = $request->minimum_withdraw;
        $model->maximum_withdraw = $request->maximum_withdraw;
        $model->telegram = $request->telegram;
        $model->customer_service_one = $request->customer_service_one;
        $model->customer_service_two = $request->customer_service_two;
        $model->first_refer_commission = $request->first_refer_commission;
        $model->second_refer_commission = $request->second_refer_commission;
        $model->third_refer_commission = $request->third_refer_commission;

        $model->auto_deposit = $request->auto_deposit;
        $model->auto_transfer = $request->auto_transfer;
        $model->auto_transfer_default = $request->auto_transfer_default;

        $model->open_deposit = $request->open_deposit;
        $model->open_transfer = $request->open_transfer;

        $model->gtr_mchtId = $request->gtr_mchtId;
        $model->gtr_appId = $request->gtr_appId;
        $model->gtr_secret_key = $request->gtr_secret_key;

        $model->update();
        return redirect()->route($this->route.'.index')->with('success', 'Settings Updated Successfully.');
    }
}
