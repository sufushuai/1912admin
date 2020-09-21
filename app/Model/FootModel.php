<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FootModel extends Model
{
    protected $table='shop_foot';
    protected $primaryKey='foot_id';
    public $timestamps=false;
    protected $fillable = ['f_name','f_url'];
}
