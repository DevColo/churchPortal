<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $table='members';
    protected $fillable=[
        'member_id','fname', 'mname','lname','sex','DOB', 'image','address','dept_id','post','cell','email','admin_id'
    ];
}
