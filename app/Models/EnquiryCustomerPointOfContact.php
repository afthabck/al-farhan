<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnquiryCustomerPointOfContact extends Model
{
    use SoftDeletes;

    protected $table='enquiry_customer_point_of_contacts';

    protected $fillable=[
        'customer_id','full_name','country_id','department','designation',
        'phone','email','alternate_phone','is_primary'
    ];
}
