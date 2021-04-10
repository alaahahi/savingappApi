<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    use HasFactory;
    public function product_translation($lang)
    {
        return $this->hasMany(Product_translation::class,'productId')->where('lang','=',$lang)->select('title');
    }
}
