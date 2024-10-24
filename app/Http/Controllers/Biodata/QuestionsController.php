<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\BiodataAnswers;
use App\Models\NoteQuestions;
use App\Models\Options;
use App\Models\Questions;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('note_questions.index');
     
    }

    public function list(Request $request){
        if($request->ajax()){
            $query = Questions::all();
            return DataTables::of($query)
            ->addColumn('type_questions',function($question){
                $result = '<span class="badge bg-primary">Multiple Choice</span>';
                if($question->type_question == 1){
                    $result = '<span class="badge bg-primary">Essay</span>';
                }
                return $result;
            })->rawColumns(['type_questions'])
            ->make();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('note_questions.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(),[
            'type_question' => ['required'],
            'question' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
       
        $insert = Questions::insertData($request,['option']);
        if($insert){
           if(isset($request->option) && is_array($request->option)){
            for($val = 0; $val < count($request->option);$val++){
                Options::insert([
                    'questions_id' => $insert,
                    'option_text' => $request['option'][$val],
                ]);
            }
           }
           return redirect()->route('questions.index')->with('success',"Data Input Successful");
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
        $data = Questions::findOrFail($id);
        return view('note_questions.form',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = Validator::make($request->all(),[
            'type_question' => ['required'],
            'question' => ['required']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
       
        $update = Questions::updateData($id,$request,['option']);
        if($update){
            Options::where('questions_id','=',$id)->delete();
           if(isset($request->option) && is_array($request->option)){
            for($val = 0; $val < count($request->option);$val++){
                Options::insert([
                    'questions_id' => $id,
                    'option_text' => $request['option'][$val],
                ]);
            }
           }
           return redirect()->route('questions.index')->with('success',"Data Update Successful");
        }
        return redirect()->back()->with('error','Data Update Failed, Please try again in a few moments!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $oldData = Questions::findOrFail($id);
        Options::where('questions_id','=',$id)->delete();
        $oldData->delete();
        return redirect()->back()->with('success','Delete Data Successfully');
    }
}
