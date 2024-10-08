<?php

namespace App\Http\Controllers\SelectedInformation;

use App\Http\Controllers\Controller;
use App\Models\SelectedInformation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SelectedInformationController extends Controller
{

    /**
     * Listing of the resource.
     */

    public function list(Request $request)
    {
        //
        if($request->ajax()){
            $data = SelectedInformation::query();
            return DataTables::of($data)->make();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('selected_information.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('selected_information.form');
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
        $data = SelectedInformation::findOrFail($id);
        return view('selected_information.form',compact(['data']));
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
