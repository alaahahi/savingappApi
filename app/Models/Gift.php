<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $table = 'gift';
    use HasFactory;

    public function gift_translation($lang)
    {
        return $this->hasMany(Product_translation::class,'productId')->where('lang','=',$lang)->get();
    }
    
}
