<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){
        $biodata = Biodata::getCount();
        $pengguna = User::count();
        return view('dashboard.index',compact(['biodata','pengguna']));
    }
}
