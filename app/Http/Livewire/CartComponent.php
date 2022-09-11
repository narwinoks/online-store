<?php

namespace App\Http\Livewire;
// use Gloudemans\Shoppingcart\Facades\Cart;
// use Gloudemans\Shoppingcart\Cart;
use Cart;


use Livewire\Component;

class CartComponent extends Component
{
    public function render()
    {
        // return null;
        return view('livewire.cart-component')->layout('Layouts.base');
    }
}
