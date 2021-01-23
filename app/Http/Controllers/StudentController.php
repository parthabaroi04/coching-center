<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function studentRegistrationForm(){
       $schools = School::where('status','=',1)->get();
      // $classes =
       return view('admin.student.student-registration-form',[
           'schools'=>$schools
       ]);
   }
}
