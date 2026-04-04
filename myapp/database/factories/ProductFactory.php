<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
 
    protected $model = Product::class ; 

    public function definition(): array
    {
        return [
            
            'name'=> $this->faker->word() , 
            'email' =>$this->faker->unique()->safeEmail() , 
            'description' =>$this->faker->sentence(10) , 
            'category' =>$this->faker->randomElement(['Electronics' , 'Clothing' , 'food', 'books']),
            'is_active'=>$this->faker->boolean() ,

        ];
    }
}
