<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkuAttr extends Model
{
    protected $table="sku_attr";
    protected $primaryKey="attr_id";
    public $timestamps=false;
    protected $guarded=[];
    protected $fillable = ['attr_name','add_time','is_del'];
}
