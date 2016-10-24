<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable = [
        'id',
        'name'
    ];

    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }
    public function tagShow($id)
    {
        $categories = $this->category->all();
        $products = $this->product->ofTag($id)->get();
        return view('store.products.tag', compact('categories','products'));
    }
}
