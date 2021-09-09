<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login() {
        return view("auth.login");
    }

    public function registration() {
        return view("auth.register");
    }

    public function registerUser(Request $request) {
        $request->validate([
            'lrn' => ['required', 'integer', 'unique:students'],
            'status' =>  ['required', 'string'],
            'grd_lv_enroll' =>  ['required', 'string'],
            'curriculum' =>  ['required', 'string'],
            'lastSchoolAtt' => ['required', 'string'],
            'fname' => ['required', 'string'],
            'mname' => ['max:255'],
            'lname' => ['required', 'string'],
            'dateBirth' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'contactNo' => ['required', 'integer'],
            'region' => ['required', 'string'],
            'province' => ['required', 'string'],
            'town' => ['required', 'string'],
            'barangay' => ['required', 'string'],
            'fatherName' => ['max:255'],
            'fatherContact' => [ 'max:255'],
            'motherName' => ['max:255'],
            'motherContact' => ['max:255'],
            'guardianName' => ['max:255'],
            'guardianContact' => ['max:255'],
            'password' => ['required']
        ]);

        $student = new Student();
        $student->lrn = $request->lrn;
        $student->status = $request->status;
        $student->grd_lv_enroll = $request->grd_lv_enroll;
        $student->curriculum = $request->curriculum;
        $student->lastSchoolAtt = $request->lastSchoolAtt;
        $student->fname = $request->fname;
        $student->mname = $request->mname;
        $student->lname = $request->lname;
        $student->dateBirth = $request->dateBirth;
        $student->gender = $request->gender;
        $student->contactNo = $request->contactNo;
        $student->region = $request->region;
        $student->province = $request->province;
        $student->town = $request->town;
        $student->barangay = $request->barangay;
        $student->fatherName = $request->fatherName;
        $student->fatherContact = $request->fatherContact;
        $student->motherName = $request->motherName;
        $student->motherContact = $request->motherContact;
        $student->guardianName = $request->guardianName;
        $student->guardianContact = $request->guardianContact;
        $student->password = Hash::make($request->password);

        $res = $student->save();
        if ($res) {
            return back()->with('success', 'You have register successfully.');
        }else {
            return back()->with('fail', 'Something wrong');
        }
    }

    public function login_post(Request $request) {
        return $this->checkUserLogin($request);
    }

    public function checkUserLogin($request){
      $fieldType = ctype_digit($request->get_your_input) ? 'roll_no' : 'username';
       $request->merge([
           $fieldType => $request->input('get_your_input')
       ]);
       $credits = $request->only($fieldType, 'password');
       if ($fieldType == 'username') {
           if (Auth::guard('web')->attempt($credits)) {
               return redirect()->route('admin.dashboard'); //if admin
           } else {
               return $this->partofIt($credits);
           }
       } else {
           return $this->partofIt($credits);
       }
    }
    public function partofIt($credits)
    {
        if (Auth::guard('teacher')->attempt($credits)) {
            return redirect()->route('teacher.dashboard'); //if teacher or faculty
        } else {
            // if (Auth::guard('student')->attempt($credits)) {
            //     return redirect()->route('student.dashboard'); //if student
            // } else {
                return redirect()->route('auth.login')->with('msg', 'Login credentials are invalid');
            // }
        }
    }

    public function logout(){
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        if (Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
        }
        return redirect()->route('auth.login');
    }
}
