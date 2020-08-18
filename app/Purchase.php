<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['order_id', 'product_id', 'price', 'quantity'];
}
