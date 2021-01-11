<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCosmetic extends Model
{
    protected $fillable = ['id', 'image','product', 'color', 'brand', 'price', 'purchaseDate', 'category'];
}
