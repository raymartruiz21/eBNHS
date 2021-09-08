<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class StudentController extends Controller
{
    public function login() {
        return view("form.login");
    }

    public function registration() {
        return view("form.register");
    }

    public function registerUser(Request $request) {
        $request->validate([
            'lrn' => ['required', 'integer'],
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
            'password' => ['required','min:8']
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

    public function loginUser(Request $request) {
        $request->validate([
            'lrn' => ['required', 'integer'],
            'password' => 'required',
            // 'userType' =>  ['required']
        ]);

        $student = Student::where('lrn', '=', $request->lrn)->first();

        if ($student) {
            if (Hash::check($request->password, $student->password)) {
                $request->session()->put('loginID', $student->id);

                return redirect('dashboard');
            }else {
                return back()->with('fail', "Password    not match!");
            }
        }else {
            return back()->with('fail', "This LRN is not registered!");
        }
    }

    // user dashboard
    public function dashboard() {
        return "Welcome User";
    }
}
