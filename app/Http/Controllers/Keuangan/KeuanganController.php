<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\PaymentAmount;
use App\Models\PaymentCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KeuanganController extends Controller
{
    //
    public function index(Request $request){
        return view('keuangan.index');
    }

    public function list(Request $request){
        if($request->ajax()){
            $users = Biodata::query();
            return DataTables::of($users)->make();
        }
    }

  

    public function Biaya(Request $request,string $id){
        $paymentCategory = PaymentCategory::where('payment_category_status','=','1')->latest()->get();
        $paymentAmount = PaymentAmount::where('biodata_id','=',$id)->latest()->get();
        return view('keuangan.biaya',compact(['paymentCategory','id','paymentAmount']));
    }
    public function setBiaya(Request $request,string $id){
        $paymentCategory = PaymentCategory::latest()->get();
    }

    public function detail(Request $request,string $id){

    }

}
