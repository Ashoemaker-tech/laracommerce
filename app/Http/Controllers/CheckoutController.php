<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('checkout');
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
     * Stipe client to communicate with server
     */
    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $contents = Cart::content()->map(function($item) {
            return $item->options->slug.', '.$item->qty;
        })->values()->toJson();

            $paymentIntent = PaymentIntent::create([
                "amount" => Cart::total(),
                "currency" => "USD",
                "description" => 'Order',
                "reciept_email" => $request->email,
                "metadata" => [
                    "contents" => $contents,
                    "quantity" => Cart::instance('default')->content()->count()
                ]
            ]); 
            $output = [
            'clientSecret' => $paymentIntent->client_secret,
            ];
            session()->put('payment_successful', true);
            // Successful connection
            return json_encode($output);
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
        //
    }
}
