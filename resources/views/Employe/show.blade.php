@extends('dashboard')

@section('title')
    Page Index
@endsection

@section('content')
     <style>
        p{
            font-size :20px;
            text-align: center;
        }
        p span{
            color:Olive;
            font-size: 20px;
            text-align: center;
        }
        h2{
            text-align: center;
        }
     </style>
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('Employe.index')}}">Retour</a>
</div>
     <div class="card">
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen">Fiche Employé</h4></div>

           <div class="card" style="width: 18rem;">
                <img class="card-img-top img-thumbnail shadow-2-strong" src="{{ asset($employes->photo) }}" alt="image de {{$employes->Nom_employe}}">
           </div>
            <h2 class="card-title"><span>Nom :</span>   {{$employes->Nom_employe}}</h5>
            <p class="card-text"><span>Prénom :</span>   {{$employes->Prenom_employe}}</p>
            <p class="card-text"><span>CIN :</span>  {{$employes->CIN}}</p>
            <p class="card-text"><span>Date de naissance :</span>  {{$employes->Date_Naissance}}</p>
            <p class="card-text"><span>Numero de telephone :</span>  {{$employes->Numero_Tel}}</p>
            <p class="card-text"><span>Email :</span> {{$employes->Email}}</p>
            <p class="card-text"><span>Diplome :</span>  {{$employes->Diplome}}</p>
            <p class="card-text"><span>Profession  :</span> {{$employes->Profession}}</p>
            <p class="card-text"><span>Date d'Entree :</span> {{$employes->Date_Entree}}</p>
            <p class="card-text"><span>Date de sortie :</span> {{$employes->Date_Sortie}}</p>
            <p class="card-text"><span>Statut :</span> {{$employes->Statut}}</p>
            <p class="card-text"><span>CNSS :</span> {{$employes->CNSS}}</p>
            <p class="card-text"><span>Salaire Fixe :</span> {{$employes->salaireFixe}}</p>
            <p class="card-text"><span>Adresse :</span> {{$employes->Adresse}}</p>
     </div>
@endsection
