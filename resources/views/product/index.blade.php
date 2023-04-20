<?php
/** @var \Illuminate\Database\Eloquent\Collection $products */
?>

<x-app-layout>
    
        <div
            class="grid gap-8 grig-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
        >
            @foreach($products as $product)
                <!-- Product Item -->
                <div
                    x-data="productItem({{ json_encode([
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                        'addToCartUrl' => route('cart.add', $product)
                    ]) }})"
                    class="transition-colors bg-white border border-gray-200 rounded-md border-1 hover:border-purple-600"
                >
                    <a href="{{ route('product.view', $product->slug) }}"
                       class="block overflow-hidden aspect-w-3 aspect-h-2">
                        <img
                            src="{{ $product->image }}"
                            alt=""
                            class="object-cover transition-transform rounded-lg hover:scale-105 hover:rotate-1"
                        />
                    </a>
                    <div class="p-4">
                        <h3 class="text-lg">
                            <a href="{{ route('product.view', $product->slug) }}">
                                {{$product->title}}
                            </a>
                        </h3>
                        <h5 class="font-bold">${{$product->price}}</h5>
                    </div>
                    <div class="flex justify-between px-4">
                    </div>
                </div>
                <!--/ Product Item -->
            @endforeach
        </div>
        {{$products->links()}}
</x-app-layout>
