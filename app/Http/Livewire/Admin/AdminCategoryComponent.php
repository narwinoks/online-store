<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();
        session()->flash('message', 'Category deleted successfully !');
    }
    public function render()
    {
        $categories=Category::paginate(5);
        return view('livewire.admin.admin-category-component',compact('categories'))->layout('Layouts.base');
    }
}
