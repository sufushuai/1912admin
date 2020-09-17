<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model
{
    protected $table='shop_discount';
    protected $primaryKey='dis_id';
    public $timestamps=false;
    protected $fillable = ['money'];
}
