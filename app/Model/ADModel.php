<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ADModel extends Model
{
    protected $table="shop_ad";
    protected $primaryKey="ad_id";
    public $timestamps=false;
    protected $guarded=[];
    protected $fillable = ['*'];
}
