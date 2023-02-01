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
        <a  class="btn btn-primary" href="{{ route('Transport.index')}}">Retour</a>
</div>
     <div class="card">
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen">Fiche Transport</h4></div>
        <h2 class="card-title"><span>Immatriculation :</span>    {{$transport->Immatriculation}}</h2>
            <p class="card-text"><span>Nom d'employé :</span>   {{$transport->employe->Nom_employe}}</p>
            <p class="card-text"><span>Prénom d'employé :</span>   {{$transport->employe->Prenom_employe}}</p>

            <p class="card-text"><span>Marque :</span>   {{$transport->Marque}}</p>
            <p class="card-text"><span>Date fin de Vignette :</span>  {{$transport->Date_fin_Vignette}}</p>
            <p class="card-text"><span>Date de Debut d'assurance :</span>  {{$transport->Date_Visite_Assurance_Debut}}</p>
            <p class="card-text"><span>Date de fin d'assurance :</span>  {{$transport->Date_Visite_Assurance_Fin}}</p>
            <p class="card-text"><span>Date de la Visite technique Fin  :</span> {{$transport->Date_Visite_technique_Fin}}</p>
            <p class="card-text"><span>Date de la Visite d'equipement Fin :</span>  {{$transport->Date_Visite_equipement_Fin}}</p>
     </div>
@endsection
