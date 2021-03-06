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

    public function getFirstImageAttribute()
    {
        return $this->images()->first();

    }
    public function getTagListAttribute()
    {
        $tags = $this->tags->pluck('name')->toArray();
        return implode(', ', $tags);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured','=','1');
    }
    public function scopeRecommended($query)
    {
        return $query->where('recommend','=','1');
    }
    public function scopeOfCategory($query, $type)
    {
        return $query->where('category_id','=',$type);
    }

    public function scopeOfTag($query, $id)
    {
        return $query->where('tag_id', '=', $id);
    }

}
