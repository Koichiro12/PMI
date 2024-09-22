<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller
{
    //

    public function index(Request $request){
        $data = User::findOrFail(auth()->user()->id);
        return view('profile.index',compact(['data']));
    }
    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $update = User::findOrFail(auth()->user()->id);
        
    }
}
