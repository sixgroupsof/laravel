<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daybook extends Model
{
    //指定表名
    protected $table ='daybooks';
//    protected $keyType = 'uuid';
     public $incrementing = false;
//    //指定ID
//    protected $primaryKey='id';
//    public $timestamps=true;
//    protected $fillable=['thetheme','describes','expirationtime',];
}
