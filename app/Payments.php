<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table='tithe';
    protected $fillable=[
        'year','month','amount','member_id','admin_id'
    ];
}
