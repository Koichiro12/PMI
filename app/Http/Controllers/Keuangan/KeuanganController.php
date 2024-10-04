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
        $paymentAmount = PaymentAmount::lockForUpdate()->where('biodata_id','=',$id)->latest()->get();
        foreach($paymentCategory as $pc){
            if(isset($request['category_amount_'.$pc->id])){
                $isAvailable = false;
                foreach($paymentAmount as $pa){
                    if($pa->payment_categories_id == $pc->id){
                        $isAvailable = true;
                        $pa->update([
                            'amount' => $request['category_amount_'.$pc->id],
                            'note' => isset($request['category_note_'.$pc->id]) && $request['category_note_'.$pc->id] != null ? $request['category_note_'.$pc->id] : '-' ,
                        ]);
                    }
                }
                if(!$isAvailable){
                    PaymentAmount::insert([
                        'biodata_id' => $id,
                        'payment_categories_id' => $pc->id,
                        'amount' => $request['category_amount_'.$pc->id],
                        'note' => isset($request['category_note_'.$pc->id]) && $request['category_note_'.$pc->id] != null ? $request['category_note_'.$pc->id] : '-' ,
                    ]);
                }
            }
            
        }
        return redirect()->back()->with('success',"Update Data Berhasil");
        
    }

    public function detail(Request $request,string $id){
        $biodata = Biodata::findOrFail($id);
        $paymentCategory = PaymentCategory::where('payment_category_status','=','1')->latest()->get();
        return view('keuangan.detail',compact(['biodata','paymentCategory','id']));
    }

}
