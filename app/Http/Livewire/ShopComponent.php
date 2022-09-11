<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
// use Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;
class ShopComponent extends Component
{
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item Added successfully');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        $products=Product::paginate(12);
        return view('livewire.shop-component',[
            'products'=>$products
        ])->layout('Layouts.base');
    }
}
