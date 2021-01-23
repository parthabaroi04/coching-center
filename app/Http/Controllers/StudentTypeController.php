<?php

namespace App\Http\Controllers;

use App\AddClass;
use App\StudentType;
use Illuminate\Http\Request;
use DB;

class StudentTypeController extends Controller
{
    public function studentType(){
        $studentTypes = $this->getStudentType();
        $classes = AddClass::all();

        return view('admin.settings.student-type.student-type-list',[
            'studentTypes'=>$studentTypes,
            'classes'=>$classes
        ]);
    }

    public function studentTypeSave(Request $request){
        if($request->ajax()){
            $data = new StudentType();
            $data ->class_id = $request->class_id;
            $data ->student_type = $request->student_type;
            $data ->status = 1;
            $data->save();
        }
    }

    public function studentTypeList(){
        $studentTypes = $this->getStudentType();
        $classes = AddClass::all();

        return view('admin.settings.student-type.student-type-table',[
            'studentTypes'=>$studentTypes,
            'classes'=>$classes
        ]);
    }
    protected function getStudentType(){
        $studentTypes = DB::table('student_types')
            ->join('add_classes','student_types.class_id','=','add_classes.id')
            ->select('student_types.*','add_classes.add_class')
            ->where('student_types.status','!=',2)
            ->get();
        return $studentTypes;
    }
    public function studentTypeUnPublished(Request $request){
        $data = StudentType::find($request->type_id);
        $data ->status =0 ;
        $data->save();

        $studentTypes = $this->getStudentType();
        $classes = AddClass::all();

        return view('admin.settings.student-type.student-type-table',[
            'studentTypes'=>$studentTypes,
            'classes'=>$classes
        ]);
    }
    public function studentTypePublished(Request $request){
        $data = StudentType::find($request->type_id);
        $data ->status=1;
        $data->save();

        $studentTypes = $this->getStudentType();
        $classes = AddClass::all();

        return view('admin.settings.student-type.student-type-table',[
            'studentTypes'=>$studentTypes,
            'classes'=>$classes
        ]);
    }

    public function studentTypeUpdate(Request $request){
        $data = StudentType::find($request->type_id);
        $data ->student_type = $request->student_type;
        $data->save();

        $studentTypes = $this->getStudentType();
        $classes = AddClass::all();

        return view('admin.settings.student-type.student-type-table',[
            'studentTypes'=>$studentTypes,
            'classes'=>$classes
        ]);
    }

    public function studentTypeDelete(Request $request){
        $data = StudentType::find($request->type_id);
        $data ->status=2;
        $data->save();

        $studentTypes = $this->getStudentType();
        $classes = AddClass::all();

        return view('admin.settings.student-type.student-type-table',[
            'studentTypes'=>$studentTypes,
            'classes'=>$classes
        ]);
    }

}
