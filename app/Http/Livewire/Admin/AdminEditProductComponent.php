<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use App\Models\Category;


class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $ISBN_13;
    public $Author;
    public $Publisher;
    public $Language;
    public $Pages;
    public $Published_Year;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $nweimage;
    public $product_id;

    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->ISBN_13 = $product->ISBN_13;
        $this->Author = $product->Author;
        $this->Publisher = $product->Publisher;
        $this->Language = $product->Language;
        $this->Pages = $product->Pages;
        $this->Published_Year = $product->Published_Year;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->product_id = $product->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updateProduct()
    {
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->ISBN_13 = $this->ISBN_13;
        $product->Author = $this->Author;
        $product->Publisher = $this->Publisher;
        $product->Language = $this->Language;
        $product->Pages = $this->Pages;
        $product->Published_Year = $this->Published_Year;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if ($this->nweimage) {
            $imageName = Carbon::now()->timestamp. '.' . $this->nweimage->extension();
            $this->nweimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','Product has been updated successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
