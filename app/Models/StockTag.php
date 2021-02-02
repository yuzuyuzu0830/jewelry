<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTag extends Model
{
    public function stock_cosmetic()
    {
        return $this->belongsToMany('App\Models\StockCosmetic');
    }
}
