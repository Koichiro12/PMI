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
        $validate = \Validator::make($request->all(),[
            'job_order_no' => ['required'],
            'nama_tionghoa' => ['required'],
            'nama_inggris' => ['required'],
            'tma' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $insert = SelectedInformation::insertData($request);
        if($insert){
            return redirect()->route('selected_information.index')->with('success',"Insert Data Berhasil");
        }
        return redirect()->back()->with('error',value: 'Insert Data Gagal, Silahkan coba lagi beberapa saat lagi !');

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
        $validate = \Validator::make($request->all(),[
            'job_order_no' => ['required'],
            'nama_tionghoa' => ['required'],
            'nama_inggris' => ['required'],
            'tma' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $update = SelectedInformation::updateData($id,$request);
        if($update){
            return redirect()->route('selected_information.index')->with('success',"Update Data Berhasil");
        }
        return redirect()->back()->with('error',value: 'Update Data Gagal, Silahkan coba lagi beberapa saat lagi !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $oldData = SelectedInformation::findOrFail($id);
        $oldData->delete();
        return redirect()->route('selected_information.index')->with('success',"Hapus Data Berhasil");
    }
}
