@extends('dashboard')

@section('title')
    Page Show
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
        <a  class="btn btn-primary" href="{{ route('Frais.index')}}">Retour</a>
</div>
     <div class="card">
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen">Fiche Renumeration</h4></div>
            <h2 class="card-title"><span> </span>  Employé</h2>
            <p class="card-text"><span>Nom d'employé :</span>  {{ $renumeration->employe->Nom_employe}}</p>
            <p class="card-text"><span>Prénom d'employé :</span>  {{ $renumeration->employe->Prenom_employe}}</p>
            <p class="card-text"><span>Profession d'employé :</span>  {{ $renumeration->Profession}}</p>
            <p class="card-text"><span>Type de rénumération :</span>  {{ $renumeration->Type_renumeration}}</p>
            <p class="card-text"><span>Valeur de rénumération :</span>  {{ $renumeration->Valeur_renumeration}}</p>
            <p class="card-text"><span>Date de rénumération :</span>  {{ $renumeration->Date_renumeration}}</p>
            <p class="card-text"><span>Date De :</span>  {{ $renumeration->DateFrom}}</p>
            <p class="card-text"><span>Date A  :</span>  {{ $renumeration->DateTo}}</p>
     </div>
@endsection
