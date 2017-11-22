<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAssign extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['id','user_id','role_id'];
}
