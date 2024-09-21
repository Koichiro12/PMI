<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    //
    public function viewLogin(Request $request){
        if(!Auth::check()){
          return view('auth.signin');
        }
        return redirect('/');
    }

    public function getEmailOrUsername(Request $request){
        $eou = $request->input('username');
        $field = filter_var(value: $eou, filter:FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        return $field;
    }

    public function auth(Request $request){
        //Login Function
       
        $validator = Validator::make($request->all(),[
            'username' => ['required'],
            'password' => ['required'],
            'captcha' => ['required','captcha']
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $eou = $this->getEmailOrUsername($request);
        $email = $request->input('username');
        $rm = $request->input('rememberme');
        $remember_me = $rm != null ? true : false;
        if($eou == 'username'){
            $user = User::where('username','=',$request->input('username'))->first();
            if(!$user){
                return redirect('/signin')->with('error','Pengguna Tidak ditemukan')->withInput();
            }   
            $email = $user->email;
            
        }
        $request->merge(['email' => $email]);
        $credential = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credential,$remember_me)){
            
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return redirect('/signin')->with('error','Username atau password salah / tidak terdaftar')->withInput();
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function loadCaptcha(Request $request){
        return response()->json(['captcha'=> captcha_img()]);
    }
}
