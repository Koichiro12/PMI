<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
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

}
