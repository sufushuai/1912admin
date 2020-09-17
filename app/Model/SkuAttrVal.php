<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkuAttrVal extends Model
{
    protected $table="shop_attr_val";
    protected $primaryKey="attr_val_id";
    public $timestamps=false;
    protected $guarded=[];
    protected $fillable = ['*'];
}
