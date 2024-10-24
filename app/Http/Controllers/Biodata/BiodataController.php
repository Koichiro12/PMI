<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\BiodataAnswers;
use App\Models\BiodataExperience;
use App\Models\BiodataFamilyOverseas;
use App\Models\Questions;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('biodata.index');
        
    }


    public function list(Request $request){
        if($request->ajax()){
            $users = Biodata::query();
            return DataTables::of($users)->make();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $question = Questions::all();
        return view('biodata.form',compact(['question']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validate = \Validator::make($request->all(),[
            'kode_biodata' => ['required'],
            'nama' => ['required'],
            'tempat_lahir' => ['required'], 
            'tgl_lahir' => ['required'],
            'umur' => ['required'],
            'tb' => ['required'],
            'bb' => ['required'],
            'kewarganegaraan' => ['required'],
            'pendidikan' => ['required'],
            'bahasa' => ['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $request['status_ayah'] = $request->status_ayah != null ? 1 : 0;
        $request['status_ibu'] = $request->status_ibu != null ? 1 : 0;
        $request['family_in_taiwan'] = $request->family_in_taiwan != null ? 1 : 0;
        $request['foto'] = '-';
        if($request->hasFile('foto-biodata') && $request->file('foto-biodata')->isValid()){
            $file = $request->file('foto-biodata');
            $name = date('Y_M_d_h_i_s').$file->getClientOriginalName();
            $file->move($this->defaultUploadsDirectory,$name);
            $request['foto'] = $name;
        }

        //Exceptions
        $Question = Questions::all();
        $exceptions = ['foto-biodata','fit_name','fit_relation','fit_location','domestic_masa_kerja','domestic_wilayah_kerja','domestic_desc_kerja','overseas_masa_kerja','overseas_wilayah_kerja','overseas_desc_kerja'];
        $qexceptions = [];
        foreach($Question as $q){
            array_push($qexceptions,"biodata_answer_". $q->id);
            array_push($qexceptions,"biodata_answer_". $q->id."_0");
            array_push($qexceptions,"biodata_answer_". $q->id."_0_text");
        }
        $exceptions = array_merge($exceptions,$qexceptions);
       
        $insert = Biodata::insertData($request,$exceptions);
        if($insert){
            foreach($Question as $q){
                if(isset($request['biodata_answer_'.$q->id])){
                    $customAnswer = '';
                    if($request['biodata_answer_'.$q->id] == '0'){
                        $customAnswer = $request['biodata_answer_'.$q->id.'_0_text'];
                    }
                    BiodataAnswers::insert([
                        'biodata_id' => $insert,
                        'questions_id' => $q->id,
                        'answer' => $request['biodata_answer_'.$q->id],
                        'custom_answer' => $customAnswer
                    ]);
                }
            }
            if(isset($request->fit_name) && is_array($request->fit_name)){
                for($val = 0; $val < count($request->fit_name);$val++){
                    BiodataFamilyOverseas::insert([
                        'biodata_id' => $insert,
                        'name' => $request['fit_name'][$val],
                        'relasi' => $request['fit_relation'][$val],
                        'lokasi' => $request['fit_location'][$val],
                    ]);
                }
            }
            if(isset($request->domestic_masa_kerja) && is_array($request->domestic_masa_kerja)){
                for($val = 0; $val < count($request->domestic_masa_kerja);$val++){
                    BiodataExperience::insert([
                        'biodata_id' => $insert,
                        'type_pekerjaan' => 'domestic',
                        'masa_kerja' => $request['domestic_masa_kerja'][$val],
                        'wilayah_kerja' => $request['domestic_wilayah_kerja'][$val],
                        'desc_pekerjaan' => $request['domestic_desc_kerja'][$val],
                    ]);
                }
            }
            if(isset($request->overseas_masa_kerja) && is_array($request->overseas_masa_kerja)){
                for($val = 0; $val < count($request->overseas_masa_kerja);$val++){
                    BiodataExperience::insert([
                        'biodata_id' => $insert,
                        'type_pekerjaan' => 'overseas',
                        'masa_kerja' => $request['overseas_masa_kerja'][$val],
                        'wilayah_kerja' => $request['overseas_wilayah_kerja'][$val],
                        'desc_pekerjaan' => $request['overseas_desc_kerja'][$val],
                    ]);
                }
            }
            return redirect()->route('biodata.index')->with('success',"Data Input Successful");
        }
        return redirect()->back()->with('error','Data Input Failed, Please try again in a few moments!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Biodata::findOrFail($id);
        $question = Questions::all();
        return view('biodata.form',compact(['data','question']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $oldData = Biodata::findOrFail($id);
        $validate = \Validator::make($request->all(),[
            'kode_biodata' => ['required'],
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tgl_lahir' => ['required'],
            'umur' => ['required'],
            'tb' => ['required'],
            'bb' => ['required'],
            'kewarganegaraan' => ['required'],
            'pendidikan' => ['required'],
            'bahasa' => ['required'],
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
      
        $request['status_ayah'] = $request->status_ayah != null ? 1 : 0;
        $request['status_ibu'] = $request->status_ibu != null ? 1 : 0;
        $request['family_in_taiwan'] = $request->family_in_taiwan != null ? 1 : 0;
        $request['foto'] = $oldData->foto;
        if($request->hasFile('foto-biodata') && $request->file('foto-biodata')->isValid()){
            $file = $request->file('foto-biodata');
            $name = date('Y_M_d_h_i_s').$file->getClientOriginalName();
            $file->move($this->defaultUploadsDirectory,$name);
            $request['foto'] = $name;
        }

        $Question = Questions::all();
        $exceptions = ['foto-biodata','fit_name','fit_relation','fit_location','domestic_masa_kerja','domestic_wilayah_kerja','domestic_desc_kerja','overseas_masa_kerja','overseas_wilayah_kerja','overseas_desc_kerja'];
        $qexceptions = [];
        foreach($Question as $q){
            array_push($qexceptions,"biodata_answer_". $q->id);
            array_push($qexceptions,"biodata_answer_". $q->id."_0");
            array_push($qexceptions,"biodata_answer_". $q->id."_0_text");
        }
        $exceptions = array_merge($exceptions,$qexceptions);
        $update = Biodata::updateData($id,$request,$exceptions);
        if($update){
            BiodataFamilyOverseas::where('biodata_id','=',$id)->delete();
            BiodataExperience::where([['biodata_id','=',$id],['type_pekerjaan','=','domestic']])->delete();
            BiodataExperience::where([['biodata_id','=',$id],['type_pekerjaan','=','overseas']])->delete();
            BiodataAnswers::where('biodata_id','=',$id)->delete();
            foreach($Question as $q){
                if(isset($request['biodata_answer_'.$q->id])){
                    $customAnswer = '';
                    if($request['biodata_answer_'.$q->id] == '0'){
                        $customAnswer = $request['biodata_answer_'.$q->id.'_0_text'];
                    }
                    BiodataAnswers::insert([
                        'biodata_id' => $id,
                        'questions_id' => $q->id,
                        'answer' => $request['biodata_answer_'.$q->id],
                        'custom_answer' => $customAnswer
                    ]);
                }
            }

            if(isset($request->fit_name) && is_array($request->fit_name)){
               
                for($val = 0; $val < count($request->fit_name);$val++){
                    BiodataFamilyOverseas::insert([
                        'biodata_id' => $id,
                        'name' => $request['fit_name'][$val],
                        'relasi' => $request['fit_relation'][$val],
                        'lokasi' => $request['fit_location'][$val],
                    ]);
                }
            }
            if(isset($request->domestic_masa_kerja) && is_array($request->domestic_masa_kerja)){
               
                for($val = 0; $val < count($request->domestic_masa_kerja);$val++){
                    BiodataExperience::insert([
                        'biodata_id' => $id,
                        'type_pekerjaan' => 'domestic',
                        'masa_kerja' => $request['domestic_masa_kerja'][$val],
                        'wilayah_kerja' => $request['domestic_wilayah_kerja'][$val],
                        'desc_pekerjaan' => $request['domestic_desc_kerja'][$val],
                    ]);
                }
            }
            if(isset($request->overseas_masa_kerja) && is_array($request->overseas_masa_kerja)){
               
                for($val = 0; $val < count($request->overseas_masa_kerja);$val++){
                    BiodataExperience::insert([
                        'biodata_id' => $id,
                        'type_pekerjaan' => 'overseas',
                        'masa_kerja' => $request['overseas_masa_kerja'][$val],
                        'wilayah_kerja' => $request['overseas_wilayah_kerja'][$val],
                        'desc_pekerjaan' => $request['overseas_desc_kerja'][$val],
                    ]);
                }
            }
            return redirect()->route('biodata.index')->with('success',"Update Data Successful");
        }
        return redirect()->back()->with('error','Update Data Failed, Please try again in a few moments!');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $oldData = Biodata::findOrFail($id);
        if($oldData->foto != '-' && $oldData->foto != null && file_exists($this->defaultUploadsDirectory.'/'.$oldData->foto)){
            unlink($this->defaultUploadsDirectory.'/'.$oldData->foto);
        }
        BiodataExperience::where('biodata_id','=',$id)->delete();
        BiodataFamilyOverseas::where('biodata_id','=',$id)->delete();
        $oldData->delete();
        return redirect()->back()->with('success','Delete Data Successfully');
    }

    public function printPdf(string $id){
        $data = Biodata::findOrFail($id);
        $question = Questions::all();
        return view('biodata.print',compact(['data','question']));
    }

    

}
