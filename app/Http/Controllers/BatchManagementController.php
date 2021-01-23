<?php

namespace App\Http\Controllers;

use App\AddClass;
use App\Batch;
use Illuminate\Http\Request;

class BatchManagementController extends Controller
{
    public function addBatch(){
      $classes =  AddClass::all();
        return view('admin.settings.batch.batch-add-form',[
            'classes'=>$classes
        ]);
    }

    public function addBatchSave(Request $request){
        $this->validate($request,[
            'class_id'=>'required',
            'batch_name'=>'required|string',
            ]);

        $data = new Batch();
        $data->class_id = $request->class_id;
        $data->batch_name = $request->batch_name;
        $data->status = 1;
        $data->save();

        return back()->with('message','Batch Saved Successfully');
    }

    public function batchList(){
        $classes =  AddClass::all();
        return view('admin.settings.batch.batch-list-form',[
            'classes'=>$classes
        ]);
    }

    public function batchListByAjax(Request $request){
        $batches = Batch::where([
            'class_id'=>$request->id
        ])->get();

        if (count($batches)>0){
            return view('admin.settings.batch.batch-list-by-ajax',[
                'batches'=>$batches
            ]);
        }else{
            return view('admin.settings.batch.batch-error-form');
        }
    }

    public function batchUnpublished(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch ->status = 0;
        $batch->save();

        $batches = Batch::where([
            'class_id'=>$request->class_id
        ])->get();

        return view('admin.settings.batch.batch-list-by-ajax',[
            'batches'=>$batches
        ])->with('message','Batch unpublished Successfully');
    }
    public function batchPublished(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch ->status = 1;
        $batch->save();

        $batches = Batch::where([
            'class_id'=>$request->class_id
        ])->get();

        return view('admin.settings.batch.batch-list-by-ajax',[
            'batches'=>$batches
        ])->with('message','Batch Published Successfully');
    }
    public function batchDelete(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch ->delete();

        $batches = Batch::where([
            'class_id'=>$request->class_id
        ])->get();

        if (count($batches)>0){
            return view('admin.settings.batch.batch-list-by-ajax',[
                'batches'=>$batches
            ])->with('msg','Batch Delete Successfully');
        }else{
            return view('admin.settings.batch.batch-error-form');
        }

    }

    public function batchEdit($id){
        $batch = Batch::find($id);
        $classes =  AddClass::all();
        return view('admin.settings.batch.batch-edit-form',[
            'classes'=>$classes,
            'batch'=>$batch
        ]);
    }

    public function batchUpdate(Request $request){
        $this->validate($request,[
            'class_id'=>'required',
            'batch_name'=>'required|string',
            'student_capacity'=>'required',
        ]);
        $batch = Batch::find($request->batch_id);
        $batch->class_id = $request->class_id;
        $batch->batch_name = $request->batch_name;
        $batch->student_capacity = $request->student_capacity;
        $batch->save();

        return redirect('/batch/list')->with('message','Batch Updated Successfully');
    }
}
