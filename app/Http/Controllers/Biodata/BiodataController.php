<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('biodata.index');
    }


    public function list(Request $request){
        if($request->ajax()){
            $users = Biodata::query();
            return DataTables::of($users)->make();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('biodata.form');
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
        $data = Biodata::findOrFail($id);
        return view('biodata.form',compact(['data']));
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
    }
}
