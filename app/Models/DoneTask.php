<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoneTask extends Model
{
    //
    protected $fillable = ['id', 'title', 'start', 'textColor'];
}
