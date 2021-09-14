@extends('layouts.app')
@section('title', 'Login')
@section('content')

<div class="container py-4">
  <form method="POST" action="{{ route('auth.login_post') }}" autocomplete="off">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h2 class="card-title">Login</h2><br><hr>
                @csrf
                    <div class="row justify-content-center">
                      @if (session()->has('msg'))
                      <div class="col-md-12">
                        <div class="alert alert-warning text-center" role="alert">{{ session('msg') }}</div>
                      </div>
                      @endif
                      <div class="col-md-8">
                        <div class="form-group mb-1">
                            <label for="get_your_input" class="col-form-label text-md-right">Username | ID</label>
                            <input id="get_your_input" type="text" class="form-control" name="get_your_input" value="{{ old('get_your_input') }}" required>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group mb-1">
                            <label for="username" class="col-form-label text-md-right">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6 text-center">
                        <div class="form-group py-4">
                          <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                      </div>
                      {{-- <div class="form-group">
                      <label >Username | ID</label>
                      <input type="text" name="get_your_input" class="form-control" required >
                      </div>
                      <div class="form-group">
                      <label >Password</label>
                      <input type="password" name="password" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button> --}}
                    </div>
              </div>
            </div>
      </div>
  </form>
</div>
@endsection
