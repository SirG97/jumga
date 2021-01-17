@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row" id="root">
            <div class="col-md-12 p-card mt-4">
                <h2>All <b>Products</b></h2>
                <div class="row">
                    <div class="col-sm-3" v-for="product in products">
                        <div class="thumb-wrapper">
                            <div class="img-box">
                                <img :src="'/img/products/' + product.image" :alt="product.name + ' picture'" class="img-fluid">
                            </div>
                            <div class="thumb-content">
                                <h4>@{{ product.name }}</h4>
                                <p class="item-price"><span>$@{{ product.unit_price }}</span></p>
{{--                                <div class="star-rating">--}}
{{--                                    <ul class="list-inline">--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                                <a href="#" class="btn btn-primary"
                                   @click.prevent="addToCart(product.merchant_id,product.product_id, product.name, product.unit_price, $event)">Add to Cart</a>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-sm-3">--}}
{{--                        <div class="thumb-wrapper">--}}
{{--                            <div class="img-box">--}}
{{--                                <img src="{{asset('/img/headphone.jpg')}}" class="img-fluid" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="thumb-content">--}}
{{--                                <h4>Sony Headphone</h4>--}}
{{--                                <p class="item-price"><strike>$25.00</strike> <span>$23.99</span></p>--}}
{{--                                <div class="star-rating">--}}
{{--                                    <ul class="list-inline">--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <div class="thumb-wrapper">--}}
{{--                            <div class="img-box">--}}
{{--                                <img src="{{asset('/img/macbook-air.jpg')}}" class="img-fluid" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="thumb-content">--}}
{{--                                <h4>Macbook Air</h4>--}}
{{--                                <p class="item-price"><strike>$899.00</strike> <span>$649.00</span></p>--}}
{{--                                <div class="star-rating">--}}
{{--                                    <ul class="list-inline">--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <div class="thumb-wrapper">--}}
{{--                            <div class="img-box">--}}
{{--                                <img src="{{asset('/img/nikon.jpg')}}" class="img-fluid" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="thumb-content">--}}
{{--                                <h4>Nikon DSLR</h4>--}}
{{--                                <p class="item-price"><strike>$315.00</strike> <span>$250.00</span></p>--}}
{{--                                <div class="star-rating">--}}
{{--                                    <ul class="list-inline">--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

            </div>
        </div>
    </div>

{{--    <section class="categories-container container mx-auto">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="category">--}}
{{--                    <div class="category-header">Gadgets</div>--}}
{{--                    <div class="category-img">--}}
{{--                        <img src="{{ asset('/img/gadget.jpg') }}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="category">--}}
{{--                    <div class="category-header">Clothing</div>--}}
{{--                    <div class="category-img">--}}
{{--                        <img src="{{asset('/img/clothing.jpeg')}}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="category">--}}
{{--                    <div class="category-header">Beauty</div>--}}
{{--                    <div class="category-img">--}}
{{--                        <img src="{{ asset('/img/beautygad.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="new-arrival-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h2>New <b>Arrivals</b></h2>--}}
{{--                    <div id="arrivals" class="carousel slide" data-ride="carousel" data-interval="0">--}}
{{--                        <!-- Carousel indicators -->--}}
{{--                        <ol class="carousel-indicators">--}}
{{--                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
{{--                            <li data-target="#myCarousel" data-slide-to="1"></li>--}}
{{--                            <li data-target="#myCarousel" data-slide-to="2"></li>--}}
{{--                        </ol>--}}
{{--                        <!-- Wrapper for carousel items -->--}}
{{--                        <div class="carousel-inner">--}}
{{--                            <div class="carousel-item active">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{ asset('/img/ipad.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Apple iPad</h4>--}}
{{--                                                <p class="item-price"><span--}}
{{--                                                        style="text-decoration: line-through;">$400.00</span> <span>$369.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/headphone.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Sony Headphone</h4>--}}
{{--                                                <p class="item-price"><strike>$25.00</strike> <span>$23.99</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/macbook-air.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Macbook Air</h4>--}}
{{--                                                <p class="item-price"><strike>$899.00</strike> <span>$649.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/nikon.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Nikon DSLR</h4>--}}
{{--                                                <p class="item-price"><strike>$315.00</strike> <span>$250.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="carousel-item">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/play-station.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Sony Play Station</h4>--}}
{{--                                                <p class="item-price"><strike>$289.00</strike> <span>$269.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{ asset('/img/macbook-pro.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Macbook Pro</h4>--}}
{{--                                                <p class="item-price"><strike>$1099.00</strike> <span>$869.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/speaker.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Bose Speaker</h4>--}}
{{--                                                <p class="item-price"><strike>$109.00</strike> <span>$99.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/galaxy.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Samsung Galaxy S8</h4>--}}
{{--                                                <p class="item-price"><strike>$599.00</strike> <span>$569.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="carousel-item">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/iphone.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Apple iPhone</h4>--}}
{{--                                                <p class="item-price"><strike>$369.00</strike> <span>$349.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/canon.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Canon DSLR</h4>--}}
{{--                                                <p class="item-price"><strike>$315.00</strike> <span>$250.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{asset('/img/pixel.jpg')}}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Google Pixel</h4>--}}
{{--                                                <p class="item-price"><strike>$450.00</strike> <span>$418.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="thumb-wrapper">--}}
{{--                                            <div class="img-box">--}}
{{--                                                <img src="{{ asset('/img/watch.jpg') }}" class="img-fluid" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="thumb-content">--}}
{{--                                                <h4>Apple Watch</h4>--}}
{{--                                                <p class="item-price"><strike>$350.00</strike> <span>$330.00</span></p>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <a href="#" class="btn btn-primary">Add to Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Carousel controls -->--}}
{{--                        <a class="carousel-control-prev" href="#arrivals" data-slide="prev">--}}
{{--                            <i class="fa fa-angle-left"></i>--}}
{{--                        </a>--}}
{{--                        <a class="carousel-control-next" href="#arrivals" data-slide="next">--}}
{{--                            <i class="fa fa-angle-right"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection()


