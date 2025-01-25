<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Coming;
use App\Models\Improvment;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComingController extends Controller
{
    public $route = 'admin.coming';
    public function index()
    {
        $coming = Coming::get();
        return view('admin.pages.coming.index', compact('coming'));
    }

    public function create($id=null)
    {
        $data = null;
        if ($id){
            $data = Coming::find($id);
        }
        return view('admin.pages.coming.insert', compact('data'));
    }

    public function insert_or_update(Request $request)
    {
        if ($request->id){
            $model = Coming::findOrFail($request->id);
        }else{
            $model = new Coming();
        }
        $path = uploadImage(false ,$request, 'photo', 'upload/coming/', null, null ,$model->photo);
        $model->photo = $path ?? $model->photo;

        $model->price = $request->price;
        $model->step = $request->step;
        $model->save();
        return redirect()->route($this->route.'.index')->with('success', $request->id ? 'coming package Updated Successful.' : 'coming Created Successful.');
    }

    public function delete($id)
    {
        $model = Coming::find($id);
        $model->delete();
        return redirect()->route($this->route.'.index')->with('success','Item Deleted Successful.');
    }
}
