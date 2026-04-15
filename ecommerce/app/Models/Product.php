<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category ; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Product extends Model
{
    
    use HasFactory;

    protected $fillable  = [
        'cat_id' , 
        'name' , 
        'slug' , 
        'description' , 
        'price' , 
        "stock_quantity" , 
        "image" , 
        "is_active" , 
    ] ; 

    public function categories(){

        return $this->belongsTo(Category::class,'cat_id' , "id") ; 
    }
}
