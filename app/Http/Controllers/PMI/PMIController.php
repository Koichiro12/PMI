<?php

namespace App\Http\Controllers\PMI;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\FileCategory;
use App\Models\PMI;
use App\Models\PMIFiles;
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
                $pmi = PMI::where('biodata_id','=',$biodata->id)->first();
                $pmiFiles = PMIFiles::where('pmi_id','=',$pmi->id)->latest()->get();
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
                        $defaultResult = ' <span class="badge bg-danger">File Belum Diupload</span>';
                        if(isset($pmiFiles)){
                            foreach($pmiFiles as $pf){
                                if($pf->file_categories_id == $cb->id){
                                    $defaultResult = '<a href="'.asset('uploads/'.$pf->file).'" class="btn btn-info btn-block m-2" name="berkas" id="berkas" target="_blank">Download</a>';
                                }
                            }
                        }
                        $result .= '<tr>
                            <td>'.$no.'</td>
                            <td>'.$cb->category_files.'</td><td>';
                        $result .= $defaultResult;
                        $result .='</tr></td>';
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
        $biodata = Biodata::findOrFail($id);
        $pmi = PMI::where('biodata_id','=',$id)->first();
        $category_files = FileCategory::where('category_status','=','1')->latest()->get();
        return view('PMI.form',compact(['id','category_files','pmi','biodata']));
    }
    public function update(Request $request, string $id){
        
    }

}
