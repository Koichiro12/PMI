<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    //
    public function index(Request $request){
        return view('keuangan.index');
    }
}
