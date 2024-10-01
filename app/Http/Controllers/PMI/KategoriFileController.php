<?php

namespace App\Http\Controllers\PMI;

use App\Http\Controllers\Controller;
use App\Models\FileCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('categoryfiles.index');
    }


    public function list(Request $request){
        if($request->ajax()){
            $category = FileCategory::query();
            
            return DataTables::of($category)->make();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categoryfiles.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = \Validator::make($request->all(),[
            'category_files' => ['required'],
            'category_status' => ['required']           
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $insert = FileCategory::insertData($request);
        if($insert){
            return redirect()->route('category_files.index')->with('success',"Input Data Berhasil");
        }
        return redirect()->back()->with('error',value: 'Input Data Gagal, Silahkan coba lagi beberapa saat lagi !');
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
        $data = FileCategory::findOrFail($id);
        return view('categoryfiles.form',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = \Validator::make($request->all(),[
            'category_files' => ['required'],
            'category_status' => ['required']           
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $insert = FileCategory::updateData($id,$request);
        if($insert){
            return redirect()->route('category_files.index')->with('success',"Update Data Berhasil");
        }
        return redirect()->back()->with('error',value: 'Update Data Gagal, Silahkan coba lagi beberapa saat lagi !');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $oldData = FileCategory::findOrFail($id);
        $oldData->delete();
        return redirect()->route('category_files.index')->with('success',"Hapus Data Berhasil");
    }
}
