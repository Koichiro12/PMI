<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Payment;
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

    public function PaymentList(Request $request,string $id = null){
        if($request->ajax()){
            $payment = Payment::where('biodata_id','=',$id)->latest()->get();
            return DataTables::of($payment)
            ->addColumn('tanggal',function($p){
                return date_format(date_create($p->created_at),'d M Y h:i:s');
            })
            ->addColumn('biaya',function($p){
                return $p->PaymentCategory->payment_category; 
            })
            ->addColumn('bayar',function($p){
                return 'Rp.'.number_format($p->payment).',-'; 
            })
            ->addColumn('note_or_bukti',function($p){
                $result = '';
                $result .= $p->bukti != null && $p->bukti != "-" ? '<a href="'.asset('uploads/'.$p->bukti).'" class="btn btn-sm btn-block btn-primary" target="_blank">Lihat Bukti </a>' : '<span class="badge bg-red">Tidak Tersedia</span>';
                $result .= '<hr>';
                $result .= '<b>*Note</b><br>';
                $result .= $p->note ;
                return $result;
            })
            ->addColumn('status',function($p){
                $result = '';
                switch($p->payment_status){
                    case '0':
                        $result = '<span class="badge bg-yellow">Pending</span>';
                        break;
                    case '1':
                        $result = '<span class="badge bg-green">Sukses</span>';
                        break;
                    case '2':
                        $result = '<span class="badge bg-red">Gagal / Cancel</span>';
                        break;
                }
                return $result;
            })
            ->addColumn('aksi',function($p){
                
            })
            ->rawColumns(['note_or_bukti','status','aksi'])
            ->make();
        }
    }
}
