@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('registerStudent') }}">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #b3fff0;"><h4>{{ __('Enrollment Form') }}</h4></div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-md-12">
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if (Session::has('fail'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ Session::get('fail') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-1">
                                            <label for="lrn" class="col-form-label text-md-right">{{ __('LRN') }}</label>
                                            <input id="lrn" type="text" class="form-control @error('lrn') is-invalid @enderror" name="lrn" value="{{ old('lrn') }}" autocomplete="off"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)"
                                            maxlength="11" autofocus autocomplete="off">
                                            @error('lrn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-1">
                                            <label for="status" class="col-form-label text-md-right">{{ __('Status') }}</label>
                                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" >
                                                <option value="">Select Status</option>
                                                <option value="Incoming Grade-7" @if (old('status') == "Incoming Grade-7") {{ 'selected' }} @endif>Incoming Grade-7</option>
                                                <option value="Transferee" @if (old('status') == "Transferee") {{ 'selected' }} @endif>Transferee</option>
                                                <option value="Balik Aral" @if (old('status') == "Balik Aral") {{ 'selected' }} @endif>Balik Aral</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-1">
                                            <label for="grd_lv_enroll" class="col-form-label text-md-right">{{ __('Grade Level to Enroll') }}</label>
                                            <select name="grd_lv_enroll" class="form-control @error('grd_lv_enroll') is-invalid @enderror" id="grd_lv_enroll" >
                                                <option value="">Select Grade Level</option>
                                                <option value="8" @if (old('grd_lv_enroll') == "8") {{ 'selected' }} @endif>Grade 8</option>
                                                <option value="9" @if (old('grd_lv_enroll') == "9") {{ 'selected' }} @endif>Grade 9</option>
                                                <option value="10" @if (old('grd_lv_enroll') == "10") {{ 'selected' }} @endif>Grade 10</option>
                                                <option value="11" @if (old('grd_lv_enroll') == "11") {{ 'selected' }} @endif>Grade 11</option>
                                                <option value="12" @if (old('grd_lv_enroll') == "12") {{ 'selected' }} @endif>Grade 12</option>
                                            </select>
                                            @error('grd_lv_enroll')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-1">
                                            <label for="curriculum" class="col-form-label text-md-right">{{ __('Curriculum') }}</label>
                                            <select  id="curriculum" class="form-control @error('curriculum') is-invalid @enderror" name="curriculum">
                                                <option value="">Select Curriculum</option>
                                                <option value="STEM" @if (old('curriculum') == "STEM") {{ 'selected' }} @endif>STEM (Science Techonology, Enginnering and Mathemathics)</option>
                                                <option value="BEC" @if (old('curriculum') == "BEC") {{ 'selected' }} @endif>BEC (Basic Education Curriculum)</option>
                                                <option value="SPA" @if (old('curriculum') == "SPA") {{ 'selected' }} @endif>SPA (Special Program for Art)</option>
                                                <option value="SPJ" @if (old('curriculum') == "SPJ") {{ 'selected' }} @endif>SPJ (journalism)</option>
                                            </select>
                                            @error('curriculum')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-1">
                                            <label for="lastSchoolAtt" class="col-form-label text-md-right">{{ __('Last School Attended') }}</label>
                                            <input id="lastSchoolAtt" type="text" class="form-control @error('lastSchoolAtt') is-invalid @enderror" name="lastSchoolAtt" value="{{ old('lastSchoolAtt') }}" autocomplete="off" autofocus autocomplete="off">
                                            @error('lastSchoolAtt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-1">
                                            <label for="fname" class="col-form-label text-md-right">{{ __('First Name') }}</label>
                                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" autocomplete="off" autofocus>
                                            
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group mb-1">
                                            <label for="mname" class="col-form-label text-md-right">{{ __('Middle Name') }}</label>
                                            <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname') }}" autocomplete="off" autofocus>
        
                                            @error('mname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group mb-1">
                                            <label for="lname" class="col-form-label text-md-right">{{ __('Last Name') }}</label>
                                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" autocomplete="off" autofocus>
                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-1">
                                            <label for="dateBirth" class="col-form-label text-md-right">{{ __('Birth of Date') }}</label>
                                            <input id="dateBirth" type="date" class="form-control @error('dateBirth') is-invalid @enderror" name="dateBirth" value="{{ old('dateBirth') }}" autocomplete="off" autofocus>
                                            @error('dateBirth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-1">
                                            <label for="gender" class="col-form-label text-md-right">{{ __('Gender') }}</label>
                                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender" >
                                                <option value="">Select Gender</option>
                                                <option value="Male" @if (old('gender') == "Male") {{ 'selected' }} @endif>Male</option>
                                                <option value="Female" @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group mb-1">
                                            <label for="contactNo" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                            <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" autocomplete="off"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)"
                                            maxlength="11">
                                            @error('contactNo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <label for="region" class="col-form-label text-md-right">{{ __('Region') }}</label>
                                            <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" autocomplete="off">
                                            @error('region')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <label for="province" class="col-form-label text-md-right">{{ __('Province') }}</label>
                                            <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" autocomplete="off">
                                            @error('province')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <label for="town" class="col-form-label text-md-right">{{ __('Town') }}</label>
                                            <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" autocomplete="off">
                                            @error('town')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <label for="barangay" class="col-form-label text-md-right">{{ __('Barangay') }}</label>
                                            <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ old('barangay') }}" autocomplete="off">
                                            @error('barangay')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group mb-1">
                                            <label for="fatherName" class="col-form-label text-md-right">{{ __("Father's Name") }}</label>
                                            <input id="fatherName" type="text" class="form-control @error('fatherName') is-invalid @enderror" name="fatherName" value="{{ old('fatherName') }}" autocomplete="off">
                                            @error('fatherName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-1">
                                            <label for="fatherContact" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                            <input id="fatherContact" type="text" class="form-control @error('fatherContact') is-invalid @enderror" name="fatherContact" value="{{ old('fatherContact') }}" autocomplete="off"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)"
                                            maxlength="11">
                                            @error('fatherContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group mb-1">
                                            <label for="motherName" class="col-form-label text-md-right">{{ __("Mother's Name") }}</label>
                                            <input id="motherName" type="text" class="form-control @error('motherName') is-invalid @enderror" name="motherName" value="{{ old('motherName') }}" autocomplete="off">
                                            @error('motherName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-1">
                                            <label for="motherContact" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                            <input id="motherContact" type="text" class="form-control @error('motherContact') is-invalid @enderror" name="motherContact" value="{{ old('motherContact') }}" autocomplete="off"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)"
                                            maxlength="11">
                                            @error('motherContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group mb-1">
                                            <label for="guardianName" class="col-form-label text-md-right">{{ __("Guardian's Name") }}</label>
                                            <input id="guardianName" type="text" class="form-control @error('guardianName') is-invalid @enderror" name="guardianName" value="{{ old('guardianName') }}" autocomplete="off">
                                            @error('guardianName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group  mb-1">
                                            <label for="guardianContact" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                            <input id="guardianContact" type="text" class="form-control @error('guardianContact') is-invalid @enderror" name="guardianContact" value="{{ old('guardianContact') }}" autocomplete="off"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)"
                                            maxlength="11">
                                            @error('guardianContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group  mb-1">
                                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" autocomplete="off" maxlength="11">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group py-4">
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
