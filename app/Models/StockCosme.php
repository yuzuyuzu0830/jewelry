<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCosme extends Model
{
    protected $fillable = ['id', 'product', 'color', 'brand', 'price', 'purchaseDate', 'category'];
}
