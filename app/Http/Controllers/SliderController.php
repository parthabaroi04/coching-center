<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function addSlider(){
        return view('admin.slider.add-slider-form');
    }

    public function uploadSlide(Request $request){
        $this->validate($request,[
            'slide_image'=>'required',
            'slide_title'=>'required',
            'slide_description'=>'required',
            'status'=>'required'
        ]);

        $data = new Slide();
        $data->slide_image = $this->addSlide($request);
        $data->slide_title = $request->slide_title;
        $data->slide_description = $request->slide_description;
        $data->status = $request->status;
        $data->save();

        return back()->with('message','Slide Added Successfully');
    }

    protected function addSlide($request){
        $file = $request->file('slide_image');
        $imageName = $file->getClientOriginalName();
        $directory = 'admin/assets/slider/';
        $imageUrl = $directory.$imageName;

        Image::make($file)->resize(1400, 570)->save($imageUrl);

        return $imageUrl;
    }

    public function manageSlide(){
        $slides = Slide::all();

        return view('admin.slider.manage-slide',[
            'slides'=>$slides
        ]);
    }

    public function slideUnpublished($id){
        $slides = Slide::find($id);
        $slides->status=0;
        $slides->save();

        return redirect('/manage-slide')->with('message','Slide Unpublished Successfully');

    }
    public function slidePublished($id){
        $slides = Slide::find($id);
        $slides->status=1;
        $slides->save();

        return redirect('/manage-slide')->with('message','Slide Published Successfully');

    }


    public function slideUpdate($id){
        $slides = Slide::find($id);

        return view('admin.slider.update-slider-form',['slides'=>$slides]);
    }

    public function updateSlide(Request $request){
        $slides = Slide::find($request->slide_id);
        $slides->slide_title = $request->slide_title;
        $slides->slide_description = $request->slide_description;
        $slides->status = $request->status;
        if ($request->file('slide_image')){
            unlink($slides->slide_image);
            $slides->slide_image = $this->addSlide($request);
        }

        $slides->save();
        return redirect('/manage-slide')->with('message','Slide Update Successfully');
    }





    public function slideDelete($id){
        $slides = Slide::find($id);
        $slides ->delete();

        return redirect('/manage-slide')->with('message','Slide Delete Successfully');
    }

    public function photoGallery(){
        $slides = Slide::all();

        return view('admin.slider.photo-gallery-form',['slides'=>$slides]);
    }

}
