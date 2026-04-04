<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant ; 

class EtudiantController extends Controller
{
    // - create - destroy - index - edit - show - update 

    public function index(){
        $etudiants = Etudiant::all()  ; 
        return view('etudiant.index' , compact('etudiants'));
    }
}
