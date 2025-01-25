<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Improvment;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImprovementController extends Controller
{
    public $route = 'admin.improvement';
    public function index()
    {
        $improvements = Improvment::get();
        return view('admin.pages.improvement.index', compact('improvements'));
    }

    public function create($id=null)
    {
        $data = null;
        if ($id){
            $data = Improvment::find($id);
        }
        return view('admin.pages.improvement.insert', compact('data'));
    }

    public function insert_or_update(Request $request)
    {
        $this->validate($request,[
            'level'=> 'required',
            'amount_limit'=> 'required|numeric',
            'between_amount'=> 'required|numeric',
            'commission'=> 'required|numeric',
            'first_refer_commission'=> 'required|numeric',
            'second_refer_commission'=> 'required|numeric',
            'third_refer_commission'=> 'required|numeric',
        ]);

        if ($request->id){
            $model = Improvment::findOrFail($request->id);
            $model->status = $request->status;
        }else{
            $model = new Improvment();
        }
        $model->level = $request->level;
        $model->amount_limit = $request->amount_limit;
        $model->between_amount = $request->between_amount;
        $model->commission = $request->commission;
        $model->first_refer_commission = $request->first_refer_commission;
        $model->second_refer_commission = $request->second_refer_commission;
        $model->third_refer_commission = $request->third_refer_commission;
        $model->save();
        return redirect()->route($this->route.'.index')->with('success', $request->id ? 'Improvement Updated Successful.' : 'Improvement Created Successful.');
    }

    public function delete($id)
    {
        $model = Improvment::find($id);
        $model->delete();
        return redirect()->route($this->route.'.index')->with('success','Item Deleted Successful.');
    }
}
