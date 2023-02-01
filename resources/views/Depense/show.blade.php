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
        <a  class="btn btn-primary" href="{{ route('Depense.index')}}">Retour</a>
</div>
     <div class="card">
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen">Fiche Dépense</h4></div>
            <h2 class="card-title"><span>Fournisseur </span>  </h2>
            <p class="card-text"><span>Nom Fournisseur :</span>  {{ $depense->fournisseur->Nom}}</p>
            <p class="card-text"><span>Catégorie :</span>   {{$depense->categorie}}</p>
            <p class="card-text"><span>Sous Catégorie :</span>   {{$depense->SousCategorie}}</p>
            <p class="card-text"><span>Date de dépense :</span>  {{$depense->Date_Depense}}</p>
            <p class="card-text"><span>Heure de dépense :</span>  {{$depense->Heure_Depense}}</p>
            <p class="card-text"><span>Montant de dépense :</span>  {{$depense->Montant_Depense}}</p>
            <p class="card-text"><span>Description de dépense :</span> {{$depense->Description}}</p>

     </div>
@endsection
