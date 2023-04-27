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
        $cartItems = [];
        foreach(Cart::content() as $item) {
            $product = Product::find($item->id);
            array_push($cartItems, $product);
        }
            $subtotal = Cart::subtotal();
        // $subtotal =  number_format( $subtotal / 100, 2);
        // dd(ShoppingCart::all());
        return view('cart', [
            'mightAlsoLike' => $mightAlsoLike,
            'subtotal' => $subtotal,
            'cartItems' => $cartItems
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
        Cart::add($request->id, $request->name, 1, $request->price);
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
