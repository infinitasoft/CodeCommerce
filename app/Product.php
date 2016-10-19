<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'featured',
        'recommend',
        'alltags'
    ];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->pluck('name')->toArray();
        return implode(', ', $tags);
    }

}
