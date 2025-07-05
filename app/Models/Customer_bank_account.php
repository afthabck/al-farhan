<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer_bank_account extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'bank_id','bank_documents'
    ];
}
