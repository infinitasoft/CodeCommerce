<?php

namespace CodeCommerce\Http\Controllers\Admin;

use Illuminate\Http\Request;
use CodeCommerce\ProductImage;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpKernel\HttpCache\Store;

class ProductImagesController extends Controller
{
    public $product;
    public $productImage;

    public function __construct(ProductImage $productImage, Product $product)
    {
        $this->productImage = $productImage;
        $this->product = $product;
    }

    public function index()
    {
        $images = $this->productImage->paginate(15);
        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        $products = $this->product->pluck('name','id');
        return view('admin.images.create', compact('products'));
    }

    public function store(Requests\ImageRequest $request)
    {
        $file = $request->file('image');
        $fileName        = $file->getClientOriginalName();
        $extension       = $file->getClientOriginalExtension() ?: 'png';
        $folderName      = '/assets/uploads/';
        $destinationPath = public_path() . $folderName;
        $safeName        = str_random(10).'.'.$extension;
        $file->move($destinationPath, $safeName);
        $input = $request->all();
        $savephoto = $this->productImage->fill($input);
        $savephoto->name = $safeName;
        $savephoto->save();

        return redirect()->route('admin.images.index');
    }

    public function delete($id)
    {
        $this->productImage->find($id)->delete();
        return redirect()->route('admin.images.index');
    }
}
