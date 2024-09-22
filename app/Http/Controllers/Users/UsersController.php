<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //return redirect()->route('pengguna.index');
    }
}
