<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class R_F_Q_Customer_ponit_of_contact extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'customer_id','full_name','country_id','department','designation',
        'phone','email','alternate_phone','is_primary'
    ];
}
