<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Kategoria;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'slug',
        'description',
        'small_description',
        'original_price',
        'selling_price',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }

    public function category(){
        return $this->belongsTo(Kategoria::class, 'category_id','id');
    }
}
