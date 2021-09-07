@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sample') }}</div>

                <div class="card-body">
                    {{-- @foreach ($student as $students)
                        <h4>{{ $students->lrn }}</h4>
                        <h5>{{ $students->name }}</h5>
                    @endforeach --}}
                    <h2>welcome</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
