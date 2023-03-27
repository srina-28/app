<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function like_exist($user_id, $hotel_id) {        
        return Like::where('user_id', $user_id)->where('hotel_id', $hotel_id)->exists();       
        }
    
        public function hotel(){
            return $this->belongsTo('App\Hotel');
        }
}
