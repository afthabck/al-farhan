<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable=['product_name','slug','product_code','size_id','thickness_id','measurement','custom_size','custom_thickness','status'];

    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function thickness(){
        return $this->belongsTo(Thickness::class);
    }
}
