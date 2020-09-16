<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table="rbac_admin";
    protected $primaryKey="admin_id";
    public $timestamps=false;
}
