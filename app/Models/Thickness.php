<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thickness extends Model
{
    protected $fillable = [
        'thickness',
        'status',
    ];
}
