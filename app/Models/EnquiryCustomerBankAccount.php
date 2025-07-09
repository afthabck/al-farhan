<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnquiryCustomerBankAccount extends Model
{
    use SoftDeletes;

    protected $table='enquiry_customer_bank_accounts';

    protected $fillable=[
        'customer_id','account_holder_name','country_id','currency','bank_name',
        'iban_account_number','swift_code','branch_name','remarks','is_primary','documents'
    ];

}
