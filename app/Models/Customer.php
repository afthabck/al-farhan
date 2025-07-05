<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
       'name','VAT/Tax Id','customer_source','customer_type','customer_code',
       'website','industry_type','customer_category','customer_industry','customer_logo',
       'document_type','documents'
    ];

    public function addresses()
{
    return $this->hasMany(R_F_Q_Customer_address::class);
}

public function contactPersons()
{
    return $this->hasMany(R_F_Q_Customer_ponit_of_contact::class);
}

public function bankAccounts()
{
    return $this->hasMany( R_F_Q_Customer_Bank_Account::class);
}

public function documents()
{
    return $this->hasMany(Customer_bank_account::class);
}

}
