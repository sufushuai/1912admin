<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VipModel extends Model
{
    protected $table="shop_vip";
    protected $primaryKey="vip_id";
    public $timestamps=false;
    public $fillable=["vip_name","vip_logo"];
    
}
