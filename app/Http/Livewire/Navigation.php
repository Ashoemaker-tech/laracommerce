<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CartItem;

class Navigation extends Component
{
    public $cartItems;

    protected $listeners = [
        'cart.updated' => '$refresh'
    ];

    public function mount()
    {
        $request = \request();
        $this->cartItems = json_decode($request->cookie('cart_items', '[]'), true);
    }


    public function render()
    {
        return view('livewire.navigation');
    }
}
