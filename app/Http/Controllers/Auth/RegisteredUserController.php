<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationMail;
use App\Models\Admin;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\User;
use App\Models\UserLedger;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request, $id=null)
    {
        if ($id){
            User::find($id)->delete();
        }
        $captcha_code = rand(0000,9999);

        $ref_by = $request->query('inviteCode');
        return view('app.auth.registration', compact('ref_by', 'captcha_code'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'phone' => ['required', 'numeric', 'unique:users,phone'],
            'ref_by' => ['required', 'string'],
            'password' => ['required'],
            ],[
                'ref_by.required' => 'Refer code is required',
            ]);
        if ($validate->fails()){
            $user = User::where('phone', $request->phone)->first();
            if ($user){
                return back()->with('message', 'Phone number exist');
            }
            return back()->with('message', $validate->errors());
        }

        $getIp = \Request::ip();

        //Check refer code is next time edit
        $user = User::create([
            'name' => 'User'.rand(22,99),
            'username' => 'uname'.$request->phone,
            'ref_id' => rand(99999999,11111111),
            'ref_by' => $request->ref_by ?? User::first()->ref_id,
            'email' => 'user'.rand(11111,99999).time().'@gmail.com',
            'password' => Hash::make($request->password),
            'type' => 'user',
            'income' => 300,
            'phone' => $request->phone,
            'phone_code' => '+234',
            'ip' => $getIp,
            'code' => rand(111111, 999999),
            'remember_token' => Str::random(30),
        ]);

        if ($user){
            Auth::login($user);
            return redirect()->route('dashboard');
        }else{
            return back()->with('message', 'Registration Fail');
        }

    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}

