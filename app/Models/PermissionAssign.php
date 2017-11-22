<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionAssign extends Model
{
    protected $table = 'permission_role';
    protected $fillable = ['id','permission_id','role_id'];
}
