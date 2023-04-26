<div class="might-like-section">
    <div class="container">
        <h2>You might also like...</h2>
        <div class="might-like-grid">
            @foreach ($mightAlsoLike as $product)
             <a href="#" class="might-like-product">
                <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" alt="product">
                <div class="might-like-product-name">{{ $product->slug }}</div>
                <div class="might-like-product-price">{{ $product->formattedPrice() }}</div>
            </a>   
            @endforeach
        </div>
    </div>
</div>