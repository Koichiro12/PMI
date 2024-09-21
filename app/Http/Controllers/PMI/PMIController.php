<?php

namespace App\Http\Controllers\PMI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PMIController extends Controller
{
    //
    public function index(Request $request){
        return view('pmi.index');
    }
}
