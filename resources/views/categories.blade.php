@extends('layouts.app')

@section('content')

    <section class="categories-container container mx-auto">
        <div class="row">
            <div class="col-md-4">
                <div class="category">
                    <div class="category-header">Gadgets</div>
                    <div class="category-img">
                        <img src="{{ asset('/img/gadget.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category">
                    <div class="category-header">Clothing</div>
                    <div class="category-img">
                        <img src="{{asset('/img/clothing.jpeg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category">
                    <div class="category-header">Beauty</div>
                    <div class="category-img">
                        <img src="{{ asset('/img/beautygad.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()



