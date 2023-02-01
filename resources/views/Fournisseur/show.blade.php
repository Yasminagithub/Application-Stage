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
        <a  class="btn btn-primary" href="{{ route('Fournisseur.index')}}">Retour</a>
</div>
     <div class="card">
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen">Fiche fournisseur</h4></div>
            <h2 class="card-title"><span>Nom :</span> {{$fournisseurs->Nom}}</h2>
            <p class="card-text"><span>Numéro bancaire :</span> {{$fournisseurs->Numero_Bancaire}}</p>
            <p class="card-text"><span>Téléphone :</span> {{$fournisseurs->Telephone}}</p>
            <p class="card-text"><span>Email :</span> {{$fournisseurs->Email}}</p>
            <p class="card-text"><span>Description :</span> {{$fournisseurs->Description}}</p>
     </div>
@endsection
