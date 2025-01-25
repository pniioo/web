<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public $route = 'admin.package';
    public function index()
    {
        $packages = Package::get();
        return view('admin.pages.package.index', compact('packages'));
    }

    public function set_bonus_vip($id)
    {
        $packages = Package::get();
        foreach ($packages as $package){
            Package::where('id', $package->id)->update(['bonus_vip_id'=> null]);
        }

        $package = Package::find($id);
        $package->bonus_vip_id = $id;
        $package->update();
        return redirect()->route('admin.package.index')->with('success','Bonus vip set');
    }
    public function create($id=null)
    {
        $data = null;
        if ($id){
            $data = Package::find($id);
        }
        return view('admin.pages.package.insert', compact('data'));
    }

    public function view($id=null)
    {
        $data = Package::find($id);
        return view('admin.pages.package.view', compact('data'));
    }

    public function insert_or_update(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'title'=> 'required',
            'price'=> 'required|numeric',
            'validity'=> 'required|numeric',
            'commission_with_avg_amount'=> 'required|numeric',
            'ROI'=> 'required',
        ]);
        if ($request->id){
            $model = Package::findOrFail($request->id);
        }else{
            $model = new Package();
        }
        $path = uploadImage(false ,$request, 'photo', 'upload/package/', 200, 200 ,$model->photo);
        $model->photo = $path ?? $model->photo;
        $model->name = $request->name;
        $model->title = $request->title;
        $model->price = $request->price;
        $model->validity = $request->validity;
        $model->commission_with_avg_amount = $request->commission_with_avg_amount;
        $model->ROI = $request->ROI;
        $model->save();
        return redirect()->route($this->route.'.index')->with('success', $request->id ? 'Package Updated Successful.' : 'Package Created Successful.');
    }

    public function delete($id)
    {
        $model = Package::find($id);
        deleteImage($model->photo);
        $model->delete();
        return redirect()->route($this->route.'.index')->with('success','Item Deleted Successful.');
    }
}
