<?php

namespace App\Http\Controllers\PMI;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PMIController extends Controller
{
    //
    public function index(Request $request){
        return view('pmi.index');
    }

    public function list(Request $request){
        if($request->ajax()){
            $users = Biodata::query();
            return DataTables::of($users)->make();
        }
    }

}
