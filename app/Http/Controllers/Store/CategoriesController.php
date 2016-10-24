<?php

namespace CodeCommerce\Http\Controllers\Store;

use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public $category;
    public $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function show($id)
    {

        $categories = $this->category->all();
        $item = $this->category->find($id);
        $products = $this->product->ofCategory($id)->get();
        return view('store.categories.show', compact('item','categories','products'));
    }
}
