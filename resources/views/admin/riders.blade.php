@extends('admin.layouts.base')
@section('icon')
    <i class="fa fa-fw fas fa-motorcycle"></i>
@endsection
@section('title', 'Riders')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-details my-4 p-3 custom-panel">
                    <div class="p-details-header">
                        <h5>Add product</h5>
                    </div>
                    <div class="py-sm-3 py-2 px-2 px-sm-3 ">
                        <div class="d-flex flex-column p-details-content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                            <form class="mt-3" action="{{ url('merchant/product/create') }}" method="POST" enctype="multipart/form-data" class="p-details-form">
                                @csrf
                                <input type="hidden" id="merchant_id" name="merchant_id" value="{{Auth::guard('merchant')->user()->merchant_id}}">
                                <div class="form-row p-details-form">
                                    <div class="col-md-12 mb-3">
                                        <select class="custom-select" name="category" id="category" required>
                                            <option value="clothing">Clothing</option>
                                            <option value="gadget">Gadget</option>
                                            <option value="beauty">Beauty</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-row p-details-form">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control"  name="name" placeholder="Iphone X Max">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="text" class="form-control"  name="unit_price" placeholder="Unit Price">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" class="form-control" min="1"  name="quantity" placeholder="Quantity">
                                    </div>
                                </div>

                                <div class="form-group p-details-form">
                                    <input type="text" class="form-control"  name="description" placeholder="Short description about the food">
                                </div>

                                <div class="form-group mx-auto">
                                    <div class="custom-file">
                                        <input type="file"  name="image" class="custom-file-input" id="customFile" required>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>

                                <button class="btn float-right btn-primary save theme-color" type="submit" >Create</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



