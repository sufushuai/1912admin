<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RbacRoleBased extends Model
{
    protected $table="rbac_role_based";
    protected $primaryKey="id";
    public $timestamps=false;
}
