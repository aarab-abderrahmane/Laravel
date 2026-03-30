<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Absences ; 

class Etudiant extends Model
{
    /** @use HasFactory<\Database\Factories\EtudiantFactory> */
    use HasFactory ; 

    protected $fillable = ["nom" , "email" , "niveau" , "filiere" , "date_naissance"]; 

    public function abcence(){

        return $this->hasMany(Absences::class) ;
    } 
}
