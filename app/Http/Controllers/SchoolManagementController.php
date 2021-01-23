<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\String_;

class SchoolManagementController extends Controller
{
    public function addSchool(){
        return view('admin.settings.school.add-form');
    }

    public function schoolNameSave(Request $request){
        $this->validate($request,[
            'add_school'=>'required|String'
        ]);
        $data = new School();
        $data ->add_school = $request->add_school;
        $data ->status = 1;
        $data->save();

        return back()->with('message','School Add Successfully');
    }

    public function schoolList(){
        $schools = School::all();
        return view('admin.settings.school.school-list-form',['schools'=>$schools]);
    }

    public function schoolUnpublished($id){
        $schools = School::find($id);
        $schools->status= 0;
        $schools->save();

        return redirect('/school/list')->with('message','School Unpublished Successfully');
    }
    public function schoolPublished($id){
        $schools = School::find($id);
        $schools->status= 1;
        $schools->save();

        return redirect('/school/list')->with('message','School Published Successfully');
    }

    public function editSchool($id){
        $schools = School::find($id);
        return view('admin.settings.school.school-update-form',['schools'=>$schools]);
    }

    public function updateSchoolName(Request $request){
        $this->validate($request,[
            'add_school'=>'required|String'
        ]);
       $schools= School::find($request->school_id);
       $schools->add_school = $request->add_school;
       $schools->save();
        return redirect('/school/list')->with('message','School Updated Successfully');
    }


    public function schoolDelete($id){
        $schools = School::find($id);
        $schools->delete();

        return redirect('/school/list')->with('message','School Delete Successfully');
    }
}
