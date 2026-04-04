<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categorie ; 

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    protected $fillable = [
        "cat_id" , 
        "name" , 
        "price" , 
        "description", 
    ] ; 


    function categorie(){

        return $this->belongTo(Categorie::class) ; 

    }


}
