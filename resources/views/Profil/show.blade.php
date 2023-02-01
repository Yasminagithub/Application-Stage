@extends('dashboard')

@section('title')
    Page show Profil
@endsection

@section('content')
     <style>
        h5 span{
            color:Olive;
            font-size: 20px;
            font-family:
        }
        #img{
            max-width: 100%;
            height: auto;
        }
     </style>
<div class="text-center">
        <a  class="btn btn-success" href="{{ route('Profil.index')}}">Retour</a>

</div>

            <div style="width: 18rem;">
                <img class="img-thumbnail shadow-2-strong" id="img" src="{{ asset($profils->Photo) }}" alt="image de {{$profils->Nom_Ecole}}">
           </div>
            <h2 style="text-align:center;" class="card-title">   {{$profils->nom}}</h2>
            <h5 style="text-align:center;" class="card-title"><span>Prenom :</span>   {{$profils->Prenom}}</h5>
            <h5  style="text-align:center;" class="card-title"><span>Email :</span>   {{$profils->Email}}</h5>
            <h5  style="text-align:center;" class="card-title"><span>Adresse :</span>   {{$profils->Adresse}}</h5>

@endsection
