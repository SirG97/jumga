@extends('layouts.base')
@section('icon')
    <i class="fa fa-fw fas fa-key"></i>
@endsection
@section('title', 'Change Password')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in user!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
