<?php

namespace App\Http\Controllers;

use App\AddClass;
use Illuminate\Http\Request;

class ClassManagementController extends Controller
{
    public function addClass(){
        return view('admin.settings.class.add-class-form');
    }

    public function addClassSave(Request $request){
        $this->validate($request,[
            'add_class'=>'required|String'
        ]);
        $data = new AddClass();
        $data ->add_class = $request->add_class;
        $data ->status = 1;
        $data->save();

        return back()->with('message','Class Add Successfully');
    }

    public function classList(){
        $classes = AddClass::all();
        return view('admin.settings.class.class-list-form',['classes'=>$classes]);
    }

    public function classUnpublished($id){
        $classes = AddClass::find($id);
        $classes ->status =0;
        $classes->save();

        return redirect('/class-list')->with('message','Class Unpublished Successfully');
    }
    public function classpublished($id){
        $classes = AddClass::find($id);
        $classes ->status =1;
        $classes->save();

        return redirect('/class-list')->with('message','Class Published Successfully');
    }

    public function editClass($id){
        $class = AddClass::find($id);
        return view('admin.settings.class.class-update-form',['class'=>$class]);
    }

    public function classUpdateSave(Request $request){
        $this->validate($request,[
            'add_class'=>'required|String'
        ]);
        $classes = AddClass::find($request->class_id);
        $classes ->add_class = $request->add_class;
        $classes->save();

        return redirect('/class-list')->with('message','Class Updated Successfully');
    }


    public function classDelete($id){
        $classes = AddClass::find($id);
        $classes ->delete();

        return redirect('/class-list')->with('message','Class Delete Successfully');
    }
}
