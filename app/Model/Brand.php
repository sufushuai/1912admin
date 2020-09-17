<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'shop_brand';
    protected  $timestamp = false;
    protected  $guarded = [];
}
