<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Liste des etudiants </h1> 
    <ul> 
        
    @foreach ($etudiants as $etudiant)

            <li>{{$etudiant->nom}} - {{$etudiant->email}} - {{$etudiant->niveau}}  - {{$etudiant->filiere}}</li>
            
    @endforeach 
    
</ul>
</body>
</html>