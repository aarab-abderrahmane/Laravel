<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User ; 
use App\Models\OrderItem ; 

class Order extends Model
{
    

    protected $fillable = [
        'user_id' , 
        "total_amount" ,
        "status"  , 
        "address"  , 
    ]  ; 


    public function user(){
        // user_id is the column on THIS table (orders)
         // id is the column on the PARENT table (users)
        return $this->belongsTo(User::class , "user_d" , "id") ; 

    }

    public function items(){
        return $this->hasMany(OrderItem::class) ; 
    }


}
