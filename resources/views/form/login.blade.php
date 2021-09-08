@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('loginStudent') }}">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Login') }}</h4></div>
                    <div class="card-body">
                        <div class="row">
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
                            @csrf

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group mb-1">
                                    <label for="lrn" class="col-form-label text-md-right">{{ __('LRN (Learner Reference Number)') }}</label>
                                    <input id="lrn" type="text" class="form-control @error('lrn') is-invalid @enderror" name="lrn" value="{{ old('lrn') }}" autocomplete="lrn"
                                    pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)"
                                    maxlength="11" autofocus>
                                    @error('lrn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" password="password" value="{{ old('password') }}" autocomplete="password" autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="userType" class="col-form-label text-md-right">{{ __('User Type') }}</label>
                                    <select name="userType" class="form-control @error('userType') is-invalid @enderror" id="userType" >
                                        <option value="">Select User</option>
                                        <option value="S" @if (old('userType') == "S") {{ 'selected' }} @endif>Student</option>
                                        <option value="T" @if (old('userType') == "T") {{ 'selected' }} @endif>Teacher</option>
                                        <option value="A" @if (old('userType') == "A") {{ 'selected' }} @endif>Admin</option>
                                    </select>
                                    @error('userType')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6 offset-md-3 text-md-right">
                                {{-- <div class="form-group mb-0"> --}}
                                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
