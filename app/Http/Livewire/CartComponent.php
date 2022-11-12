<?php

namespace App\Http\Livewire;
// use Gloudemans\Shoppingcart\Facades\Cart;
// use Gloudemans\Shoppingcart\Cart;
use Cart;


use Livewire\Component;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product=Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        
    }
    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }
    public function deleteQuantity($rowId){
        Cart::remove($rowId);
        session()->flash('success_message', 'Item Has been removed');
    }
    public function deleteAllQuantity(){
        Cart::destroy();
    }
    public function render()
    {
        // return null;
        return view('livewire.cart-component')->layout('Layouts.base');
    }
}
