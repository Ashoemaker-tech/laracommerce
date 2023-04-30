@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="#">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Shopping Cart</span>
        </div>
    </div> <!-- end breadcrumbs -->
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div> 
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        </div> 
    @endif
    <div class="cart-section container">
        
        <div>
            @if (Cart::count() > 0)
            <h2>{{ Cart::count() }} items in Shopping Cart</h2>
            <div class="cart-table">
                @foreach (Cart::content() as $cartItem)
                    <div class="cart-table-row">
                        <div class="cart-table-row-left">
                            <a href="{{ route('shop.show', $cartItem->options->slug) }}"><img src="{{ asset('img/products/'.$cartItem->options->slug.'.jpg') }}" alt="item" class="cart-table-img"></a>
                            <div class="cart-item-details">
                                <div class="cart-table-item"><a href="{{ route('shop.show', $cartItem->options->slug) }}">{{ $cartItem->name }}</a></div>
                                <div class="cart-table-description">{{ $cartItem->options->details }}</div>
                            </div>
                        </div>
                        <div class="cart-table-row-right">
                            <div class="cart-table-actions">
                                {{-- <a href="#">Remove</a> <br> --}}
                                <form action="{{ route('cart.destroy', $cartItem->rowId) }}" method="POST">
                                   @csrf
                                   @method('delete') 
                                   <button type="submit" class="cart-options">Remove</button>
                                </form>
                                <form action="{{ route('cart.towishlist', $cartItem->rowId) }}" method="POST">
                                   @csrf
                                   <button type="submit" class="cart-options">Add To Wish List</button>
                                </form>
                                {{-- <a href="#">Save for Later</a> --}}
                            </div>
                            <div>
                                <select class="quantity">
                                    <option selected="">1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div>{{ formattedPrice($cartItem->price) }}</div>
                        </div>
                    </div> <!-- end cart-table-row -->
                @endforeach
                @else
                    <h3>No items in cart</h3>
                @endif
            </div> <!-- end cart-table -->
            <a href="#" class="have-code">Have a Code?</a>
            <div class="have-code-container">
                <form action="#">
                    <input type="text">
                    <button type="submit" class="button button-plain">Apply</button>
                </form>
            </div> <!-- end have-code-container -->
            <div class="cart-totals">
                <div class="cart-totals-left">
                    Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                </div>
                <div class="cart-totals-right">
                    <div>
                        Subtotal <br>
                        Tax <br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        {{ formattedTotal(Cart::subtotal()) }} <br>
                        {{ formattedTotal(Cart::tax()) }} <br>
                        <span class="cart-totals-total">{{ formattedTotal(Cart::total()) }}</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->
            <div class="cart-buttons">
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <a href="{{ route('checkout.index') }}" class="button-primary">Proceed to Checkout</a>
            </div>

            @if (Cart::instance('wishlist')->count() > 0)
            <h2>{{ Cart::instance('wishlist')->count() }} items in Wish List</h2>
            <div class="saved-for-later cart-table">
                @foreach (Cart::instance('wishlist')->content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->options->slug) }}"><img src="{{ asset('img/products/'.$item->options->slug.'.jpg') }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->options->slug) }}">{{ $item->name }}</a></div>
                            <div class="cart-table-description">{{ $item->options->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            {{-- <a href="#">Remove</a> <br> --}}
                                <form action="{{ route('wishlist.destroy', $item->rowId) }}" method="POST">
                                   @csrf
                                   @method('delete') 
                                   <button type="submit" class="cart-options">Remove</button>
                                </form>
                                <form action="{{ route('wishlist.tocart', $item->rowId) }}" method="POST">
                                   @csrf
                                   <button type="submit" class="cart-options">Add To Cart</button>
                                </form>
                            {{-- <a href="#">Add To Cart</a> --}}
                        </div>
                        {{-- <div>
                            <select class="quantity">
                                <option selected="">1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div> --}}
                        <div>$2499.99</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach
                 <!-- end cart-table-row -->
            </div> <!-- end saved-for-later -->
            @else
            <h3>You have no items in your wish list</h3>
            @endif
        </div>
    </div> <!-- end cart-section -->
    @include('partials.might-like')
@endsection
