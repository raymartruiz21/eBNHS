@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('auth.login_post') }}" autocomplete="off">
        @csrf
        @if (session()->has('msg'))
        <div class="alert alert-warning text-center" role="alert">
            {{ session('msg') }}
        </div>
        @endif
        <div class="form-group">
            <label >Username | ID</label>
            <input type="text" name="get_your_input" class="form-control" required >
          </div>
          <div class="form-group">
            <label >Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
