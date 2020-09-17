<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RbacRole extends Model
{
    protected $table="rbac_role";
    protected $primaryKey="role_id";
    public $timestamps=false;
}
