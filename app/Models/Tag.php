<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function stock_cosmetics ()
    {
        return $this->belongsToMany('App\Models\StockCosmetic');
    }
}
