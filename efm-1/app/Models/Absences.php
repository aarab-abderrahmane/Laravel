<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class Absences extends Model
{
    /** @use HasFactory<\Database\Factories\AbsencesFactory> */
    use HasFactory;

    protected $fillable= ["etudiant_id","date"] ; 

    public function etudiant(){

     return $this->belongsTo(Etudiant::class);
    }

}
