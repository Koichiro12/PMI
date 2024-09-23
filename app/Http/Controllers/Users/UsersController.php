<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('users.index');
    }
    /**
     * Listing of the resource with Ajax.
     */
    public function list(Request $request){
        if($request->ajax()){
            $users = User::query();
            return DataTables::of($users)->make();
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $foto = '-';
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $file = $request->file('foto');
            $name = date('Y_M_d_h_i_s').$file->getClientOriginalName();
            $file->move($this->defaultUploadsDirectory,$name);
            $foto = $name;
        }
        $insert = User::insert([
            'foto' => $foto,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        if($insert){
            return redirect()->route('pengguna.index')->with('success','Input Data Berhasil');
        }
        return redirect()->back()->with('error','Update Data Gagal, Silahkan coba lagi beberapa saat lagi !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = User::findOrFail($id);
        return view('users.form',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'role' => ['required']
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $oldData = User::lockForUpdate()->findOrFail($id);
        $foto = $oldData->foto;
        $password = $oldData->password;
        if(isset($request->password)){
            $password = Hash::make($request->password);
        }
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $file = $request->file('foto');
            $name = date('Y_M_d_h_i_s').$file->getClientOriginalName();
            $file->move($this->defaultUploadsDirectory,$name);
            $foto = $name;
        }
        $update = $oldData->update([
            'foto' => $foto,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
            'role' => $request->role,
        ]);
        if($update){
            return redirect()->route('pengguna.index')->with('success','Input Data Berhasil');
        }
        return redirect()->back()->with('error','Update Data Gagal, Silahkan coba lagi beberapa saat lagi !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = User::lockForUpdate()->findOrFail($id);
        $foto = $data->foto != '-' ? unlink($this->defaultUploadsDirectory.'/'.$data->foto) : false;
        $data->delete();
        return redirect()->route('pengguna.index')->with('success','Hapus Data Berhasil');
    }
}
