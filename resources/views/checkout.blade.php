@extends('layouts.app')

@section('content')
    <div class="container" id="root" style="margin-top: 20px;" data-token="" >
        <div class="row">
            <div class="col-md-12">
                <div class="revieworder-card mb-5">
                    <div class="card">
                        <h5 class="card-header">Order Summary</h5>
                        <div class="card-body" style="overflow-x: scroll">
                            <div class=" d-flex justify-content-end flex-column">
                                <div class="row">
                                    <div class="col-md-12 order-items table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">item(s)</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-if="items.length == 0">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                                        Cart is empty
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr v-for="item in items">
                                                <th scope="row">@{{ item.name}}</th>
                                                <td>&#8358;@{{ item.unit_price }}</td>
                                                <td style="white-space: nowrap">

                                                    <span class="font-weight-bold product-price">@{{ item.quantity }}</span>

                                                </td>
                                                <td>&#8358;@{{ item.unit_price * item.quantity }}</td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/checkout" method="POST">
                    <div class="revieworder-card mb-5">
                        <div class="card">
                            <h5 class="card-header">Payment Method</h5>
                            <div class="card-body">

                                <div class=" d-flex justify-content-end flex-column">
                                    <div class="row">
                                        <div class="offset-md-5"></div>
                                        <div class="col-md-7">
                                            <div class="review-cart p-3 drop-shadow">

                                                <div class="form-group row" id="p_option">
                                                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Payment Option') }}</label>

                                                    <div class="col-md-6">
                                                        {{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}
                                                        <select class="custom-select" name="type" id="type">
                                                            <option value="">Select Payment Option</option>
                                                            <option value="card">Card</option>
                                                            <option value="debit_uk_account">UK Bank Transfer</option>
                                                            <option value="mobile_money_ghana">Ghana Mobile Money</option>
                                                            <option value="mpesa">Mpesa Kenya</option>
                                                        </select>
                                                        <small id="countryHelpText" class="form-text text-info">
                                                            Don't select any if you are a nigerian customer
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="form-group row hideit" id="network_option">
                                                    <label for="network" class="col-md-4 col-form-label text-md-right">{{ __('Network') }}</label>

                                                    <div class="col-md-6">
                                                        <select class="custom-select" name="network" id="network">
                                                            <option value="">Select Network</option>
                                                            <option value="MTN">MTN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row hideit" id="phone_option" >
                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"  name="phone_number" id="phone_number" value="">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="revieworder-card">
                        <div class="card">
                            <h5 class="card-header">Payment Summary</h5>
                            <div class="card-body">

                                <div class=" d-flex justify-content-end flex-column">
                                    <div class="row">
                                        <div class="offset-md-8"></div>
                                        <div class="col-md-4">
                                            <div class="review-cart p-3 drop-shadow">
                                                <div class="subtotal-container d-flex justify-content-between">
                                                    <div class="total-title">Subtotal</div>
                                                    {{--                                                        @{{ cartTotal }}--}}
                                                    <div id="subtotal">&#8358;@{{ cartTotal }}</div>
                                                </div>
                                                <div class="del-container d-flex justify-content-between">
                                                    <div class="total-title">Delivery fee</div>
                                                    <div id="delivery">&#8358;@{{ delivery_fee }}.00</div>
                                                </div>
                                                <div class="grand-container d-flex justify-content-between">
                                                    <div class="total-title grand-title font-weight-bold">Grand total</div>
                                                    <div id="grand" class="font-weight-bold total-value">&#8358;@{{ grandTotal }}</div>
                                                </div>

                                                @csrf
                                                <input type="hidden" name="delivery_fee" :value="delivery_fee">
                                                <input type="hidden" name="total" :value="rawTotal">
                                                <button href="/checkout" v-if="authenticated" :disabled="disableCheckoutBtn" class="btn btn-block theme-bg input-radius btn-primary mt-3">Checkout</button>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()



