<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['area','price','image','hotel','address','text'];

    public function review(){
        return $this->hasMany('App\Review');
    }
}
