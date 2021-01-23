<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoneTask extends Model
{
    protected $fillable = ['id', 'title', 'user_id', 'start', 'textColor'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
