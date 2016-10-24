<?php

namespace CodeCommerce\Http\Controllers\Store;

use Illuminate\Http\Request;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public $product;
    public $category;
    public $tag;

    public function __construct(Product $product, Category $category, Tag $tag)
    {
        $this->product = $product;
        $this->category = $category;
        $this->tag = $tag;
    }

    public function index()
    {

    }

    public function show($id)
    {
        $categories = $this->category->all();
        $product = $this->product->find($id);
        return view('store.products.show', compact('product','categories'));

    }
    public function tagShow($id)
    {
        $categories = $this->category->all();
        $tag = $this->tag->find($id);
        return view('store.products.tag', compact('categories','tag'));
    }
}
