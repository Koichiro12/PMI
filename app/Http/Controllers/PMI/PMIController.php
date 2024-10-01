<?php

namespace App\Http\Controllers\PMI;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\FileCategory;
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
            $biodata = Biodata::query();
            return DataTables::of($biodata)
            ->addColumn('berkas',function($biodata){
                $categoryBerkas = FileCategory::where('category_status','=','1')->latest()->get();
                $no = 1;
                $result = '';
                $result .= ' <div class="modal fade" id="modalBerkas-'.$biodata->id.'" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Berkas</h4>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                            <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Kategori Berkas</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>

                            
                          ';
                    foreach($categoryBerkas as $cb){
                        $result .= '<tr>
                            <td>'.$no.'</td>
                            <td>'.$cb->category_files.'</td>
                            <td><a href="#" class="btn btn-info btn-block m-2" name="berkas" id="berkas" >Download</a></td>
                        </tr>';
                        $no++;
                    }
                $result .= '</tbody></table></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>';
                $result .= '<a href="#" class="btn btn-primary btn-block m-2" data-toggle="modal" data-target="#modalBerkas-'.$biodata->id.'" name="berkas" id="berkas" >Berkas</a>';
                
                return $result; 
            })
            ->rawColumns(['berkas'])
            ->make();
        }
    }
    public function edit(string $id){
        
    }
    public function store(Request $request){
        
    }
    public function update(Request $request, string $id){
        
    }

}
