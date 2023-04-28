<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $item = Cart::get($id);

        $duplicates = Cart::instance('wishlist')->search(function($cartItem, $rowId) use($id) {
            return $rowId === $id;
        });

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Items is already in your wish list');
        }
        
        Cart::instance('default')->remove($id);
        $product = Product::find($item->id);
        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price / 100, 0, ['slug' => $product->slug, 'details' => $product->details]);
        // dd(Cart::instance('wishlist')->content());
        return redirect()->route('cart.index')->with('success_message', 'Item added to wish list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Cart::instance('wishlist')->get($id);

        $duplicates = Cart::instance('default')->search(function($cartItem, $rowId) use($id) {
            return $rowId === $id;
        });

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Items is already in your cart');
        }
        
        Cart::instance('wishlist')->remove($id);
        $product = Product::find($item->id);
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price / 100, 0, ['slug' => $product->slug, 'details' => $product->details]);
        // dd(Cart::instance('wishlist')->content());
        return redirect()->route('cart.index')->with('success_message', 'Item added to cart');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Cart::instance('wishlist')->remove($id);

        return back()->with('success_message', 'Item removed from wish list');

    }
}
