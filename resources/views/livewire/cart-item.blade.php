<template x-for="product of cartItems" :key="product.id">
    <div x-data="productItem(product)">
        <div
            class="flex flex-col items-center flex-1 w-full gap-4 sm:flex-row">
            <a :href="product.href"
                class="flex items-center justify-center h-32 overflow-hidden w-36">
                <img :src="product.image" class="object-cover" alt=""/>
            </a>
            <div class="flex flex-col justify-between flex-1">
                <div class="flex justify-between mb-3">
                    <h3 x-text="product.title"></h3>
                    <span class="text-lg font-semibold">
                        $<span x-text="product.price"></span>
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        Qty:
                        <input
                            type="number"
                            min="1"
                            x-model="product.quantity"
                            @change="changeQuantity()"
                            class="w-16 py-1 ml-3 border-gray-200 focus:border-purple-600 focus:ring-purple-600"
                        />
                    </div>
                    <a
                        href="#"
                        @click.prevent="removeItemFromCart()"
                        class="text-purple-600 hover:text-purple-500"
                    >Remove</a
                    >
                </div>
            </div>
        </div>
        <!--/ Product Item -->
        <hr class="my-5"/>
    </div>
</template>
