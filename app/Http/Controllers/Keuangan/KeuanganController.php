<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Payment;
use App\Models\PaymentAmount;
use App\Models\PaymentCategory;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class KeuanganController extends Controller
{
    //
    public function index(Request $request)
    {
        $this->RolesAllowed(['Administrator']);
        return view('keuangan.index');
    }

    public function list(Request $request)
    {
        $this->RolesAllowed(['Administrator']);
        if ($request->ajax()) {
            $users = Biodata::query();
            return DataTables::of($users)->make();
        }
    }



    public function Biaya(Request $request, string $id)
    {
        $this->RolesAllowed(['Administrator']);
        $paymentCategory = PaymentCategory::where('payment_category_status', '=', '1')->latest()->get();
        $paymentAmount = PaymentAmount::where('biodata_id', '=', $id)->latest()->get();
        return view('keuangan.biaya', compact(['paymentCategory', 'id', 'paymentAmount']));
    }
    public function setBiaya(Request $request, string $id)
    {
        $this->RolesAllowed(['Administrator']);
        $paymentCategory = PaymentCategory::latest()->get();
        $paymentAmount = PaymentAmount::lockForUpdate()->where('biodata_id', '=', $id)->latest()->get();
        foreach ($paymentCategory as $pc) {
            if (isset($request['category_amount_' . $pc->id])) {
                $isAvailable = false;
                foreach ($paymentAmount as $pa) {
                    if ($pa->payment_categories_id == $pc->id) {
                        $isAvailable = true;
                        $pa->update([
                            'amount' => $request['category_amount_' . $pc->id],
                            'note' => isset($request['category_note_' . $pc->id]) && $request['category_note_' . $pc->id] != null ? $request['category_note_' . $pc->id] : '-',
                        ]);
                    }
                }
                if (!$isAvailable) {
                    PaymentAmount::insert([
                        'biodata_id' => $id,
                        'payment_categories_id' => $pc->id,
                        'amount' => $request['category_amount_' . $pc->id],
                        'note' => isset($request['category_note_' . $pc->id]) && $request['category_note_' . $pc->id] != null ? $request['category_note_' . $pc->id] : '-',
                    ]);
                }
            }

        }
        return redirect()->back()->with('success', "Update Data Berhasil");

    }

    public function detail(Request $request, string $id)
    {
        $this->RolesAllowed(['Administrator']);
        $biodata = Biodata::findOrFail($id);
        $paymentCategory = PaymentCategory::where('payment_category_status', '=', '1')->latest()->get();
        return view('keuangan.detail', compact(['biodata', 'paymentCategory', 'id']));
    }
    public function StorePayment(Request $request){
        $this->RolesAllowed(['Administrator']);
       $validate = Validator::make($request->all(),[
            'biodata_id' => ['required'],
            'payment_categories_id' => ['required'],
            'type_payment' => ['required'],
            'payment' => ['required'],
       ]);
       if($validate->fails()){
        return redirect()->back()->withErrors($validate)->with('error',"Input Data Gagal, Silahkan Cek kembali inputan anda !")->withInput();
       }
       $foto = '-';
       if($request->hasFile('buktis') && $request->file('buktis')->isValid()){
            $file = $request->file('buktis');
            $name = date('Y_M_d_h_i_s').$file->getClientOriginalName();
            $file->move($this->defaultUploadsDirectory,$name);
            $foto = $name;
       }
       $request['bukti'] = $foto;
       $insert = Payment::insertData($request,['buktis']);
       if($insert){
        return redirect()->back()->with('success',"Input Data Berhasil !");
       }
       return redirect()->back()->with('error',value: 'Input Data Gagal, Silahkan coba lagi beberapa saat lagi !');
    }
    public function UpdatePayment(Request $request,string $id){
        $this->RolesAllowed(['Administrator']);
        $validate = Validator::make($request->all(),[
            'type_payment' => ['required'],
            'payment' => ['required'],
       ]);
       if($validate->fails()){
        return redirect()->back()->withErrors($validate)->with('error',"Input Data Gagal, Silahkan Cek kembali inputan anda !")->withInput();
       }
       $oldData = Payment::findOrFail($id);
       $foto = $oldData->bukti;
       if($request->hasFile('buktis') && $request->file('buktis')->isValid()){
            $file = $request->file('buktis');
            $name = date('Y_M_d_h_i_s').$file->getClientOriginalName();
            $file->move($this->defaultUploadsDirectory,$name);
            $foto = $name;
       }
       $request['bukti'] = $foto;
       $update = Payment::updateData($id,$request,['buktis']);
       if($update){
        return redirect()->back()->with('success',"Update Data Berhasil !");
       }
       return redirect()->back()->with('error',value: 'Update Data Gagal, Silahkan coba lagi beberapa saat lagi !');
    }
    public function DestroyPayment(string $id){
        $this->RolesAllowed(['Administrator']);
        $data = Payment::findOrFail($id);
        if($data->bukti != null && file_exists($this->defaultUploadsDirectory.'/'.$data->bukti)){
            unlink($this->defaultUploadsDirectory.'/'.$data->bukti);
        }
        $data->delete();
        return redirect()->back()->with('success','Hapus Data Berhasil');
    }

    public function PaymentList(Request $request, string $id = null)
    {
        $this->RolesAllowed(['Administrator']);
        if ($request->ajax()) {
            $payment = Payment::where('biodata_id', '=', $id)->latest()->get();
            return DataTables::of($payment)
                ->addColumn('tanggal', function ($p) {
                    return date_format(date_create($p->created_at), 'd M Y h:i:s');
                })
                ->addColumn('biaya', function ($p) {
                    return $p->PaymentCategory->payment_category;
                })
                ->addColumn('bayar', function ($p) {
                    return 'Rp.' . number_format($p->payment) . ',-';
                })
                ->addColumn('note_or_bukti', function ($p) {
                    $result = '';
                    $result .= $p->bukti != null && $p->bukti != "-" ? '<a href="' . asset('uploads/' . $p->bukti) . '" class="btn btn-sm btn-block btn-primary" target="_blank">Lihat Bukti </a>' : '<span class="badge bg-red">Tidak Tersedia</span>';
                    $result .= '<hr>';
                    $result .= '<b>*Note</b><br>';
                    $result .= $p->note;
                    return $result;
                })
                ->addColumn('status', function ($p) {
                    $result = '';
                    switch ($p->payment_status) {
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
                ->addColumn('aksi', function ($p) {
                    $biodata = Biodata::findOrFail($p->biodata_id);
                    $result = '';
                    $CashSelected = $p->type_payment == 'Cash' ? 'selected' : '';
                    $TransferSelected = $p->type_payment == 'Transfer' ? 'selected' : '';
                    $result .= '<div class="modal fade" id="modalEditPayment-' . $p->id . '" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="largeModalLabel">Edit Payment</h4>
                                                <small>Tambah pembayaran melalui form di sini !</small>
                                            </div>
                                            <form action="'.route('keuangan_detail.update',$p->id).'" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="'. csrf_token() .'" />
                                            <input type="hidden" name="biodata_id" id="biodata_id" value="'.$p->biodata_id.'">
                                            <div class="modal-body">';
                    $result .= '<div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line @error("payment_categories_id") error focused @enderror">
                                <p>
                                    Kategori
                                </p>
                                <select name="payment_categories_id" id="payment_categories_id"
                                    class="form-control show-tick" disabled>
                                    <option value="">-- Pilih Kategori --</option>';
                                    foreach($biodata->PaymentAmount as $item){
                                        $terbayar = 0;
                                        foreach ($biodata->Payment as $p) {
                                            if (
                                                $p->payment_categories_id ==
                                                $item->payment_categories_id
                                            ) {
                                                if ($p->payment_status == '1') {
                                                    $terbayar += $p->payment;
                                                }
                                            }
                                        }
                                        $isSelected = $p->payment_categories_id == $item->payment_categories_id ? 'selected' : '';
                                        $result .='  <option value="'.$item->payment_categories_id.'"'.$isSelected.'> '.$item->PaymentCategory->payment_category .'</option>';
                                    }
                    $result .='</select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line @error("type_payment") error focused @enderror">
                                <p>
                                    Type
                                </p>
                                <select name="type_payment" id="type_payment" class="form-control show-tick">
                                    <option value="Cash" '.$CashSelected.'>Cash</option>
                                    <option value="Transfer" '.$TransferSelected.'>Transfer
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line @error("payment") error focused @enderror">
                                    <p>
                                        Bayar
                                    </p>
                                        <input type="number" id="payment" 
                                            name="payment"class="form-control" placeholder="Bayar" value="'.$p->payment.'" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line @error("bukti") error focused @enderror">
                                        <small>
                                            Bukti Pembayaran <b>* Optional</b>
                                        </small>
                                        <input type="file" id="buktis" accept="image/*,image/png,image/jpeg,image/jpg"
                                            name="buktis"class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line @error("note") error focused @enderror">
                                    <p>
                                        Note
                                    </p>
                                        <textarea id="note" name="note"class="form-control" placeholder="Note">'.$p->note.'</textarea>
                                        
                                    </div>
                                </div>
                            </div>';
                            $pendingSelected = $p->payment_status == '0' ? 'selected' : '';
                            $suksesSelected = $p->payment_status == '1' ? 'selected' : '';
                            $cancelSelected = $p->payment_status == '2' ? 'selected' : '';
                            $result .= '<div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line @error("payment_status") error focused @enderror"">
                                        <p>
                                            Status
                                        </p>
                                        <select name="payment_status" id="payment_status" class="form-control show-tick">
                                            <option value="0" '.$pendingSelected.'>
                                                Pending</option>
                                            <option value="1" '.$suksesSelected.'>
                                                Sukses</option>
                                            <option value="2" '.$cancelSelected.'>
                                                Gagal / Cancel</option>
                                        </select>

                                    </div>
                                </div>
                            </div>';
                    
                    $result .= '</div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>'; 
            $result .= ' <form action="'.route('keuangan_detail.delete',$p->id).'" method="POST" enctype="multipart/form-data"> 
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="'. csrf_token() .'" />';
            $result .= '<a href="#" class="btn btn-warning btn-block m-2" data-toggle="modal" data-target="#modalEditPayment-' . $p->id . '" name="detail" id="detail" >Edit</a>';
            $result .= ' <button type="submit" class="btn btn-danger btn-block form-confirm" onclick="confirmDelete(event,this)">Hapus</button>';
            $result .= ' </form>';
            return $result;
                })
                ->rawColumns(['note_or_bukti', 'status', 'aksi'])
                ->make();
        }
    }
}
