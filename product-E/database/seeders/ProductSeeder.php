<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product  ; 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::create([
            "cat_id" => 1 ,   
            "name" => "product1" , 
            "price" => 124.3 , 
            "description" => "sjazksjaz szaj" ,
        ]);


    }
}
