<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnquiryCustomer extends Model
{
    use SoftDeletes;

    protected $table = 'enquiry_customers';

    protected $fillable = [
       'name','VAT/Tax Id','customer_source','customer_type','customer_code',
       'website','industry_type','customer_category','customer_industry','customer_logo',
       'document_type','documents'
    ];

    public function addresses()
{
    return $this->hasMany(EnquiryCustomerAddress::class);
}

public function contactPersons()
{
    return $this->hasMany(EnquiryCustomerPointOfContact::class);
}

public function bankAccounts()
{
    return $this->hasMany( EnquiryCustomerBankAccount::class);
}

public function documents()
{
    return $this->hasMany(Customer_bank_account::class);
}

}
