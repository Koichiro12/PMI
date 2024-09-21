<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function viewLogin(Request $request){
        if(!Auth::check()){
          return 'Hai';
        }
        return redirect('/');
    }
    public function auth(Request $request){
        //Login Function
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
