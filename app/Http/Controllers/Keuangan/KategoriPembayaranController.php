<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\PaymentCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('paymentcategory.index');
    }
    public function list(Request $request){
        if($request->ajax()){
            $category = PaymentCategory::query();
            
            return DataTables::of($category)->make();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('paymentcategory.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = \Validator::make($request->all(),[
            'payment_category' => ['required'],
            'payment_category_status' => ['required']           
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $insert = PaymentCategory::insertData($request);
        if($insert){
            return redirect()->route('category_payment.index')->with('success',"Input Data Berhasil");
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
        $data = PaymentCategory::findOrFail($id);
        return view('paymentcategory.form',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = \Validator::make($request->all(),[
            'payment_category' => ['required'],
            'payment_category_status' => ['required']           
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $update = PaymentCategory::updateData($id,$request);
        if($update){
            return redirect()->route('category_payment.index')->with('success',"Update Data Berhasil");
        }
        return redirect()->back()->with('error',value: 'Update Data Gagal, Silahkan coba lagi beberapa saat lagi !');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $oldData = PaymentCategory::findOrFail($id);
        $oldData->delete();
        return redirect()->route('category_payment.index')->with('success',"Hapus Data Berhasil");
    }
}
