<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCosmetic extends Model
{
    protected $fillable = ['id', 'image','product', 'color', 'brand', 'price', 'purchaseDate', 'category'];


    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function stock_tag() {
        return $this->belongsToMany('App\Models\StockTag');
    }
}
