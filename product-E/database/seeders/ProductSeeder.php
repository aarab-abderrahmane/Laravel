<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product  ; 
use App\Models\Categorie ; 
use Illuminate\Validation\Rules\Can;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    if (Categorie::count() == 0) {
        Categorie::factory(5)->create();
    }

    Product::factory(10)->create();
}

}
