<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order_details extends Model
{
    protected $table = 'order_details';
    use HasFactory,SoftDeletes;

}