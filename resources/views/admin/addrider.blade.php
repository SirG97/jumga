@extends('admin.layouts.base')
@section('icon')
    <i class="fa fa-fw fas fa-motorcycle"></i>
@endsection
@section('title', 'Add Riders')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register Rider') }}</div>

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
                        <form method="POST" action="{{ route('admin.createRider') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

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
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}
                                    <select class="custom-select" name="country" id="country" required>
                                        <option value="">Select Country</option>
                                        <option value="NGN" {{ old('country') == 'NGN' ? 'selected="selected"' : '' }}>Nigeria</option>
{{--                                        <option value="UK">United Kingdom</option>--}}
                                        <option value="GHS" {{ old('country') == 'GHS' ? 'selected="selected"' : '' }}>Ghana</option>
                                        <option value="KES" {{ old('country') == 'KES' ? 'selected="selected"' : '' }}>Kenya</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Bank') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select form-control-lg" id="bank" name="bank">

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
                                        {{ __('Register') }}
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




