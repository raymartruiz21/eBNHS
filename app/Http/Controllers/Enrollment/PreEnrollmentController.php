<?php

namespace App\Http\Controllers\Enrollment;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PreEnrollmentController extends Controller
{
    public function preEnrollmentForm(){
        return view('form/preEnrollmentForm');
    }

    //tapos so pag store ko arog kadi
    public function store(Request $request)
    {
       
            //insert ko muna sa student pero uda pa yan password tas username 
            //ta pag tigenroll muna so student duman palang magkakaigwang password tas username
            // i mean pag tig sectioing mo na siya. pag naglaagkana ning section saiya
            //nailing mo yang $student variable kukunun ta si last id ng student sa pag insert niya so id niya
            $student = Student::create([
                'roll_no' => $request->roll_no,
                'curriculum' => $request->curriculum,
                'student_firstname' => Str::title($request->student_firstname),
                'student_middlename' => Str::title($request->student_middlename),
                'student_lastname' => Str::title($request->student_lastname),
                'date_of_birth' => $request->date_of_birth,
                'student_contact' => $request->student_contact,
                'gender' => $request->gender,
                'region' => $request->region,
                'province' => $request->province,
                'city' => $request->city,
                'barangay' => $request->barangay,
                'last_school_attended' => $request->last_school_attended,
                'last_schoolyear_attended' => $request->last_schoolyear_attended,
                'isbalik_aral' => !empty($request->last_schoolyear_attended) ? 'Yes' : 'No',
                'mother_name' => Str::title($request->mother_name),
                'mother_contact_no' => $request->mother_contact_no,
                'father_name' => Str::title($request->father_name),
                'father_contact_no' => $request->father_contact_no,
                'guardian_name' => Str::title($request->guardian_name),
                'guardian_contact_no' => $request->guardian_contact_no,
               // 'username' => Helper::create_username($request->student_firstname, $request->student_lastname),

            ]);
            $tracking_no = rand(99, 1000) . '-' . rand(99, 1000);
            //tapos insert ko sa enrollment na  table para sa relationship
            Enrollment::create([
                'student_id' => $student->id,//<----
                'section_id' => null,//<-- null ang setion. pag nag kaigwa nayan section duman ko na yan llaagan sa pass tas username
                'grade_level' => empty($request->grade_level) ? '7' : $request->grade_level,
                'school_year_id' => 1,//<-- digid kaya tig gibo pa ko relationship sa schoolyear
                'date_of_enroll' => date("d/m/Y"),
                'enroll_status' => 'Pending',
                'tracking_no' => $tracking_no,
                'state' => 'New',
            ]);
            return $tracking_no;

/**
 * 
 * ilingon mo may kulang pa ika.. ang tiginot ko kaya si admin
 * 
 * iling mo mo so school year nasaan so school year mo?
 * di ba sa admin yan mig set sa schoolyear
 * kaya admin muna.
 * schoolyear
 * subject
 * schedule
 * masterlist->student/teacher/admin user
 * section
 * chairman->ako kaya maychairman ta sabi ni sir arkhie
 * ah cge salamat. disconnect ko na
 * 
 * ako naaa ma disconnect 
 * 
 * sisay ang consultan mo
 * sir jv
 */
    }
}
