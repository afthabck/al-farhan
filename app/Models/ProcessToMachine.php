<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessToMachine extends Model
{
    protected $table = 'process_to_machines';

    protected $fillable=[
        'process_id',
        'machine_id',
    ];
}
