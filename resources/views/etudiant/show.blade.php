@extends('dashboard')

@section('title')
    Page Index
@endsection

@section('content')
     <style>
        h2{
            text-align: center;
        }
        p{
            font-size :20px;
            text-align: center;
        }
        p span{
            color:Olive;
            font-size: 20px;
            font-family:
        }
     </style>
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('etudiant.index')}}">Retour</a>
</div>
     <div class="card">
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen">Fiche etudiant</h4></div>
           <!-- <p class="card-text"><span>Photo :</span> {{$etudiants->photo}}</p>-->
           <div class="card" style="width: 18rem;">
                <img class="card-img-top img-thumbnail shadow-2-strong" src="{{ asset($etudiants->photo) }}" alt="image de {{$etudiants->Nom_Etudiant}}">
           </div>
            <h2 class="card-title"><span>Nom :</span>   {{$etudiants->Nom_Etudiant}}</h2>
            <p class="card-text"><span>Prenom :</span>   {{$etudiants->Prenom_Etudiant}}</p>
            <p class="card-text"><span>CNE :</span>  {{$etudiants->CNE}}</p>
            <p class="card-text"><span>Genre :</span>  {{$etudiants->Genre}}</p>
            <p class="card-text"><span>Cycle :</span>  {{$etudiants->Cycle}}</p>
            <p class="card-text"><span>Niveau  :</span> {{$etudiants->Niveau}}</p>
            <p class="card-text"><span>Groupe :</span>  {{$etudiants->Groupe}}</p>
            <p class="card-text"><span>Statut :</span>  {{$etudiants->Statut}}</p>
            <p class="card-text"><span>Telephone Parent :</span> {{$etudiants->Telephone_Parent}}</p>
            <p class="card-text"><span>Nouvelle ecole :</span> {{$etudiants->Nouvelle_Ecole}}</p>
            <p class="card-text"><span>Type paiement :</span> {{$etudiants->TypePaiement}}</p>
            <p class="card-text"><span>Transport :</span> {{$etudiants->Transport}}</p>
            <p class="card-text"><span>Date de naissance :</span> {{$etudiants->Date_Naissance_Etudiant}}</p>
            <p class="card-text"><span>Numero telephone d'etudiant :</span> {{$etudiants->Nunero_Telephone_Etudiant}}</p>
            <p class="card-text"><span>Email d'etudiant :</span> {{$etudiants->Email_Etudiant}}</p>
     </div>
@endsection
