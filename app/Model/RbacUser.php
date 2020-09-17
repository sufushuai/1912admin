<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RbacUser extends Model
{
    protected $table="rbac_admin";
    protected $primaryKey="admin_id";
    public $timestamps=false;
    public $fillable=["admin_name","password"];
}
