<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RbacAdminRole extends Model
{
    protected $table="rbac_admin_role";
    protected $primaryKey="id";
    public $timestamps=false;
}
