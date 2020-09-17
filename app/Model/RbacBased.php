<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RbacBased extends Model
{
    protected $table="rbac_based";
    protected $primaryKey="based_id";
    public $timestamps=false;
}
