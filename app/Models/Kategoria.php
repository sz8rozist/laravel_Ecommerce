<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Kategoria extends Model
{
    use HasFactory;
    protected $table = 'kategoriak';

    protected $fillabel = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'category_id','id');
    }
}
