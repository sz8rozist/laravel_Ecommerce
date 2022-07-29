<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'quantity',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
