@extends('layouts.base')
@section('icon')
    <i class="fa fa-fw fas fa-address-card"></i>
@endsection
@section('title', 'Address')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Address') }}</div>

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

