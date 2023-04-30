@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

@endsection

@section('content')

    <div class="container">

        <h1 class="checkout-heading stylish-heading">Checkout</h1>
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    @csrf
                    <h2>Billing Details</h2>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="">
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="">
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <h2>Payment Details</h2>
                        <div class="form-group">
                            <label for="card-name">Name On Card</label>
                            <input type="text" class="form-control" id="card-name" name="card-name" value="">
                        </div>
                    <div id="card-element">
                        <!--Stripe.js injects the Card Element-->
                    </div>
                    <div class="spacer"></div>
                    <button id="submit" class="button-primary stripe-button full-width">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pay now</span>
                    </button>
                    <p id="card-error" role="alert"></p>
                    <p class="result-message hidden">
                        Payment succeeded, see the result in your
                        <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
                    </p>
                </form>
            </div>



            <div class="checkout-table-container">
                <h2>Your Order</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                        <div class="checkout-table-row">
                            <div class="checkout-table-row-left">
                                <img src="{{ asset('img/products/' . $item->options->slug . '.jpg') }}" alt="item"
                                    class="checkout-table-img">
                                <div class="checkout-item-details">
                                    <div class="checkout-table-item">{{ $item->name }}</div>
                                    <div class="checkout-table-description">{{ $item->options->details }}</div>
                                    <div class="checkout-table-price">{{ formattedPrice($item->price) }}</div>
                                </div>
                            </div> <!-- end checkout-table -->

                    <div class="checkout-table-row-right">
                        <div class="checkout-table-quantity">{{ $item->qty }}</div>
                    </div>
                </div> <!-- end checkout-table-row -->

                @endforeach
            </div> <!-- end checkout-table -->

            <div class="checkout-totals">
                <div class="checkout-totals-left">
                    Subtotal <br>
                    {{-- Discount (10OFF - 10%) <br> --}}
                    Tax <br>
                    <span class="checkout-totals-total">Total</span>

                </div>

                <div class="checkout-totals-right">
                    {{ formattedTotal(Cart::subtotal()) }} <br>
                    {{-- -$750.00 <br> --}}
                    {{ formattedTotal(Cart::tax()) }} <br>
                    <span class="checkout-totals-total">{{ formattedTotal(Cart::total()) }}</span>

                </div>
            </div> <!-- end checkout-totals -->

        </div>

    </div> <!-- end checkout-section -->
    </div>

@endsection
