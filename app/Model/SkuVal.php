<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkuVal extends Model
{
    protected $table="sku_val";
    protected $primaryKey="val_id";
    public $timestamps=false;
    protected $guarded=[];
    protected $fillable = [];
}
