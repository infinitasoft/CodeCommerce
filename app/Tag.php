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
}
