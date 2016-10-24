<?php

namespace CodeCommerce\Http\Controllers\Store;

use Illuminate\Http\Request;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public $category;
    public $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        $categories = $this->category->all();
        $products = $this->product->all();
        $featureds = $this->product->featured()->get();
        $recommends = $this->product->recommended()->get();
        return view('store.index', compact('categories', 'products','recommends','featureds'));
    }
}
