@extends('merchant.layouts.base')
@section('icon')
    <i class="fa fa-fw fas fa-credit-card"></i>
@endsection
@section('title', 'Add Account ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Account') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('merchant.createAccount') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="business_name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="business_name">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Bank') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select form-control-lg" id="bank" name="bank">
                                        @if(!empty($banks->data) && count($banks->data) > 0)
                                            @foreach($banks->data as $bank)
                                                <option value="{{$bank->code}}" {{ $bank->code == old('bank') ? 'selected' : '' }}> {{$bank->name}}</option>
                                            @endforeach
                                        @else
                                            <option value="" disabled selected>Retrieving banks failed</option>
                                        @endif
                                    </select>
                                    <small id="countryHelpText" class="form-text">
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="acount_number" class="col-md-4 col-form-label text-md-right">{{ __('Account number') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control"  name="account_number" id="account_number" value="" required>
                                    <small id="accountHelpText" class="form-text">
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_name" class="col-md-4 col-form-label text-md-right">{{ __('Account name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control"  name="account_name" id="account_name" value="" required readonly>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ __('Add account Details') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




