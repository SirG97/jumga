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
                                                <th scope="col">Action</th>
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
                                                    <button type="button" class="btn btn-sm theme-bg update-btn" @click="updateQuantity(item.product_id, '-')"><i class="fa fa-minus"></i> </button>
                                                    <span class="font-weight-bold product-price">@{{ item.quantity }}</span>
                                                    <button type="button" class="btn theme-bg update-btn btn-sm"  @click="updateQuantity(item.product_id, '+')"><i class="fa fa-plus"></i> </button>
                                                </td>
                                                <td>&#8358;@{{ item.unit_price * item.quantity }}</td>
                                                <td><span @click="removeItem(item.index, item.product_id)" class="remove">remove <i class="fa fa-times text-danger"></i></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
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

                                            <a href="/checkout" v-if="authenticated" :disabled="disableCheckoutBtn" class="btn btn-block theme-bg input-radius btn-primary mt-3">Checkout</a>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()


