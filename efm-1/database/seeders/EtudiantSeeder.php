<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Etudiant  ; 

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            Etudiant::create([

                'nom' => "" , 
                "email" => "hello@123" , 
                "niveau" => "TS" , 
                "filiere"=>  "dev" , 
                "date_naissance"  => "2025-10-20" ,     

            ]);


            Etudiant::factory(10)->create() ; 

    }
}
