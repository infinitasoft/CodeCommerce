<?php

namespace CodeCommerce\Http\Controllers\Admin;

use Illuminate\Http\Request;
use CodeCommerce\Category;
use CodeCommerce\Product;
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

    public function index()
    {
        $categories = $this->category->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Requests\CategoryRequest $request)
    {
        $this->category->fill($request->all())->save();
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $category = $this->category->find($id);
        $category->fill($request->all())->update();
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('admin.categories.index');
    }
}
