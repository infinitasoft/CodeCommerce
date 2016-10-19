<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $fillable = [
        'product_id',
        'name'
    ];

    public function product()
    {
        return $this->belongsTo('CodeCommerce\Product');
    }
}
