<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function register(){
        return view('form/register');
    }


    public function store(Request $request){
        //logic
        $student = Student::create([
            // 
        ]);

        return Enrollment::create([
            'student_id'=>$student->id,
        ]);

    }
}
