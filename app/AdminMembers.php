<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMembers extends Model
{
    protected $table='admin_members';
    protected $fillable=[
        'member_id','dept_id','admin_id'
    ];
}
