<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mightAlsoLike = Product::MightAlsoLike()->get();
        // dd(Cart::content());
        return view('cart', [
            'mightAlsoLike' => $mightAlsoLike,
        ]);
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
    public function store(Request $request)
    {
        $duplicates = Cart::search(function($cartItem, $rowId) use($request) {
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Items is already in your cart');
        }

        Cart::add($request->id, $request->name, 1, $request->price / 100, 0, ['slug' => $request->slug, 'details' => $request->details]);
        return redirect()->route('cart.index')->with('success_message', 'Item added to cart');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item removed from cart');
    }
    
}
