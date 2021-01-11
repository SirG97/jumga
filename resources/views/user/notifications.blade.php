@extends('layouts.base')
@section('icon')
    <i class="fa fa-fw fas fa-bell"></i>
@endsection
@section('title', 'Notifications')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Notifications') }}</div>

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
