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
        <a  class="btn btn-primary" href="{{ route('Kilometrage.index')}}">Retour</a>
</div>
     <div class="card">
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen">Fiche Kilometrage</h4></div>
            <h2 class="card-title"><span>Immatriculation :</span> {{ $kilometrage->transport->Immatriculation}} </h2>

            <p class="card-text"><span>Kilometrage :</span>   {{$kilometrage->Kilometrage}}</p>
            <p class="card-text"><span>Date de Kilometrage :</span>  {{$kilometrage->Date_Kilometrage}}</p>
            <p class="card-text"><span>Heure de Kilometrage :</span>  {{$kilometrage->Heure_Kilo}}</p>
            <p class="card-text"><span>Commentaire de Kilometrage :</span>  {{$kilometrage->Commentaire_Kilometrage}}</p>

     </div>
@endsection
