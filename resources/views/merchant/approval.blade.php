@extends('merchant.layouts.base')
@section('icon')
    <i class="fa fa-fw fas fa-check-circle"></i>
@endsection
@section('title', 'Approval')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Merchant :: Approval</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                        @if(Auth::guard('merchant')->user()->status === 1)
                            <p>You have been approved</p>
                            @else
                                <a href="{{url('/merchant/approve/proceed')}}" class="btn btn-primary">Pay $20 approval fee</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

