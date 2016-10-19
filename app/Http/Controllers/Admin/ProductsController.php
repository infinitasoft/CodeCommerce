<?php

namespace CodeCommerce\Http\Controllers\Admin;

use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\Tag;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public $product;
    public $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $products = $this->product->paginate(10);
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = $this->category->pluck('name','id');
        return view('admin.products.create', compact('categories'));

    }

    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();
        $arrayTags = $this->tagToArray($input['tags']);
        $product = $this->product->fill($input);
        $product->save();
        $product->tags()->sync($arrayTags);
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $categories = $this->category->pluck('name','id');
        return view('admin.products.edit', compact('product','categories'));

    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $input = $request->all();
        $arrayTags = $this->tagToArray($input['tags']);
        $product = $this->product->find($id);
        $product->fill($input);
        $product->tags()->sync($arrayTags);
        $product->save();
        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $this->product->find($id)->delete();
        return redirect()->route('admin.products.index');
    }

    private function tagToArray($tags)
    {
        $tags = explode(",", $tags);
        $tagCollection = [];
        foreach ($tags as $tag) {
            $t = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagCollection, $t->id);
        }
        return $tagCollection;
    }

    private function explode($tags)
    {
        $tagsM = explode(",", $tags);
        foreach ($tagsM as $tag) {
            $t = Tag::firstOrCreate([$tag]);
            array_push($tagCollection, $t->id);
        }
        return $tagsM;

    }


}
