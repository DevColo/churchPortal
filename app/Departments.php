<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table='departments';
    protected $fillable=[
        'dept','dept_code','admin_id'
    ];
}
