<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
// use Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;
class CategoryComponent extends Component
{
    public $sorting;
    public  $pagesize;
    public $category_slug;
    public function mount($category_slug)
    {
        $this->sorting = "defult";
        $this->pagesize = 12;
        $this->category_slug =$category_slug;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item Added successfully');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        $category=Category::where('slug',$this->category_slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        // dd($category);
        if ($this->sorting == "date") {
            $products = Product::where('category_id',$category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == "price") {
            $products = Product::where('category_id', $category_id)-> orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == "price-desc") {
            $products = Product::where('category_id', $category_id)-> orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::where('category_id', $category_id)-> paginate($this->pagesize);
        }
        $catgeories = Category::all();

        return view('livewire.category-component', [
            'products' => $products,
            'categories' => $catgeories,
            'category_name' => $category_name,
        ])->layout('Layouts.base');
    }
}