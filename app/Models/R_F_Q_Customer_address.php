<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class R_F_Q_Customer_address extends Model
{
    use SoftDeletes;

    protected $fillable=['customer_id','address','StreetAddress/PoBox','is_shipping',
    'is_billing','is_primary','country_id','postal_code','state','city','phone',
'email'];
}
