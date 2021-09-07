@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('register') }}">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Enrollment Form') }}</h4></div>
                    <div class="card-body">
                        <div class="row">
                            @csrf

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lrn" class="col-form-label text-md-right">{{ __('LRN (Learner Reference Number)') }}</label>
        
                                            <input id="lrn" type="text" class="form-control @error('lrn') is-invalid @enderror" name="lrn" value="{{ old('lrn') }}" autocomplete="lrn" autofocus
                                            pattern="^[0-9]{12}$" onkeypress="return numberOnly(event)"
                                            maxlength="12">
        
                                            @error('lrn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status" class="col-form-label text-md-right">{{ __('Status') }}</label>
                                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" >
                                                <option value="">Select Status</option>
                                                <option value="I" @if (old('status') == "I") {{ 'selected' }} @endif>Incoming Grade-7</option>
                                                <option value="T" @if (old('status') == "T") {{ 'selected' }} @endif>Transferee</option>
                                                <option value="B" @if (old('status') == "B") {{ 'selected' }} @endif>Balik Aral</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- @if (old('status') == "I") {{ 'readonly' }} --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
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
                                    {{-- @endif --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
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
                                        <div class="form-group">
                                            <label for="lastSchoolAtt" class="col-form-label text-md-right">{{ __('Last School Attended') }}</label>
                                            <input id="lastSchoolAtt" type="text" class="form-control @error('lastSchoolAtt') is-invalid @enderror" name="lastSchoolAtt" value="{{ old('lastSchoolAtt') }}" autocomplete="lastSchoolAtt" autofocus>
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
                                        <div class="form-group">
                                            <label for="fname" class="col-form-label text-md-right">{{ __('First Name') }}</label>
                                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" autocomplete="fname" autofocus>
                                            
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mname" class="col-form-label text-md-right">{{ __('Middle Name') }}</label>
                                            <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname') }}" autocomplete="mname" autofocus>
        
                                            @error('mname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lname" class="col-form-label text-md-right">{{ __('Last Name') }}</label>
                                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" autocomplete="lname" autofocus>
                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dateBirth" class="col-form-label text-md-right">{{ __('Birth of Date') }}</label>
                                            <input id="dateBirth" type="date" class="form-control @error('dateBirth') is-invalid @enderror" name="dateBirth" value="{{ old('dateBirth') }}" autocomplete="dateBirth" autofocus>
                                            @error('dateBirth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender" class="col-form-label text-md-right">{{ __('Gender') }}</label>
                                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender" >
                                                <option value="">Select Gender</option>
                                                <option value="M" @if (old('gender') == "M") {{ 'selected' }} @endif>Male</option>
                                                <option value="F" @if (old('gender') == "F") {{ 'selected' }} @endif>Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contactNo" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                            <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" autocomplete="contactNo" placeholder="+69 "
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
                                        <div class="form-group">
                                            <label for="region" class="col-form-label text-md-right">{{ __('Region') }}</label>
                                            <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" autocomplete="region">
                                            @error('region')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="province" class="col-form-label text-md-right">{{ __('Province') }}</label>
                                            <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" autocomplete="province">
                                            @error('province')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="town" class="col-form-label text-md-right">{{ __('Town') }}</label>
                                            <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" autocomplete="town">
                                            @error('town')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="barangay" class="col-form-label text-md-right">{{ __('Barangay') }}</label>
                                            <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ old('barangay') }}" autocomplete="barangay">
                                            @error('barangay')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="fatherName" class="col-form-label text-md-right">{{ __("Father's Name") }}</label>
                                            <input id="fatherName" type="text" class="form-control @error('fatherName') is-invalid @enderror" name="fatherName" value="{{ old('fatherName') }}" autocomplete="fatherName">
                                            @error('fatherName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fatherContact" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                            <input id="fatherContact" type="text" class="form-control @error('fatherContact') is-invalid @enderror" name="fatherContact" value="{{ old('fatherContact') }}" autocomplete="fatherContact"
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
                                        <div class="form-group">
                                            <label for="motherName" class="col-form-label text-md-right">{{ __("Mother's Name") }}</label>
                                            <input id="motherName" type="text" class="form-control @error('motherName') is-invalid @enderror" name="motherName" value="{{ old('motherName') }}" autocomplete="motherName">
                                            @error('motherName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="motherContact" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                            <input id="motherContact" type="text" class="form-control @error('motherContact') is-invalid @enderror" name="motherContact" value="{{ old('motherContact') }}" autocomplete="motherContact"
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
                                        <div class="form-group">
                                            <label for="guardianName" class="col-form-label text-md-right">{{ __("Guardian's Name") }}</label>
                                            <input id="guardianName" type="text" class="form-control @error('guardianName') is-invalid @enderror" name="guardianName" value="{{ old('guardianName') }}" autocomplete="guardianName">
                                            @error('guardianName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="guardianContact" class="col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                            <input id="guardianContact" type="text" class="form-control @error('guardianContact') is-invalid @enderror" name="guardianContact" value="{{ old('guardianContact') }}" autocomplete="guardianContact"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)"
                                            maxlength="11">
                                            @error('guardianContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-md-4 offset-md-8 text-md-right">
                                        {{-- <div class="form-group mb-0"> --}}
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                                        {{-- </div> --}}
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
