<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    use SoftDeletes;

    protected $fillable =['name','status'];

    public function machines()
{
    return $this->belongsToMany(Machine::class, 'process_to_machines', 'process_id', 'machine_id');
}
}
