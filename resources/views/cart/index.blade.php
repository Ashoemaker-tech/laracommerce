<x-app-layout>
    <div class="container mx-auto lg:w-2/3 xl:w-2/3">
        <h1 class="mb-6 text-3xl font-bold">Your Cart Items</h1>

        <div x-data="{
            cartItems: {{
                json_encode(
                    $products->map(fn($product) => [
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                        'quantity' => $cartItems[$product->id]['quantity'],
                        'href' => route('product.view', $product->slug),
                        'removeUrl' => route('cart.remove', $product),
                        'updateQuantityUrl' => route('cart.update-quantity', $product)
                    ])
                )
            }},
            get cartTotal() {
                return this.cartItems.reduce((accum, next) => accum + next.price * next.quantity, 0).toFixed(2)
            },
        }" class="p-4 bg-white rounded-lg shadow">
            <!-- Product Items -->
            <template x-if="cartItems.length">
                <div>
                    <!-- Product Item -->
                   <livewire:cart-item /> 
                    <!-- Product Item -->

                    <div class="pt-4 border-t border-gray-300">
                        <div class="flex justify-between">
                            <span class="font-semibold">Subtotal</span>
                            <span id="cartTotal" class="text-xl" x-text="`$${cartTotal}`"></span>
                        </div>
                        <p class="mb-6 text-gray-500">
                            Shipping and taxes calculated at checkout.
                        </p>

                        <form action="{{route('cart.checkout')}}" method="post">
                            @csrf
                            <button type="submit" class="w-full py-3 text-lg btn-primary">
                                Proceed to Checkout
                            </button>
                        </form>
                    </div>
                </div>
                <!--/ Product Items -->
            </template>
            <template x-if="!cartItems.length">
                <div class="py-8 text-center text-gray-500">
                    You don't have any items in cart
                </div>
            </template>

        </div>
    </div>
</x-app-layout>
