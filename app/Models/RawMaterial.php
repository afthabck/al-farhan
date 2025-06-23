<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RawMaterial extends Model
{
    use SoftDeletes;

    protected $table = 'raw_materials';

    protected $fillable=[
        'name',
        'unit',
        'status',
    ];
}
