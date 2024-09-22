<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
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
        $password = isset($request->password) && $request->password != null ? Hash::make($request->password) : $update->password;
        $foto = $update->foto;
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $file = $request->file('foto');
            $name = date('Y_M_d_h_i_s').$file->getClientOriginalName();
            $file->move($this->defaultUploadsDirectory,$name);
            $foto = $name;
        }
        $ud = $update->update([
            'foto' => $foto,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password
        ]);
        if($ud){
            return redirect()->back()->with('success','Update Data Berhasil');
        }
        return redirect()->back()->with('error','Updatvalue: e Data Gagal, Silahkan coba lagi beberapa saat lagi !');
    }
}
