<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public $defaultUploadsDirectory = 'uploads';

    public function __construct(){
        if(!is_dir($this->defaultUploadsDirectory)) mkdir($this->defaultUploadsDirectory);
    }
    public function RolesAllowed($roles = []){
        if(count($roles) < 0 ){
            return;
        }
        if(!Auth::check()){
            return;
        }
        if(!in_array(auth()->user()->role,$roles)){
            abort(404,"Page Not Found");
        }
    }
}
