<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['title','image','post'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }
}
