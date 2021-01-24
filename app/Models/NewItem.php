<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewItem extends Model
{
    protected $fillable = ['id', 'image','title', 'color', 'brand', 'price', 'start', 'category'];


    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
