@extends('dashboard')

@section('title')
    Page show Ecole
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
        <a  class="btn btn-success" href="{{ route('Ecole.index')}}">Retour</a>

</div>

            <div style="width: 18rem;">
                <img class="img-thumbnail shadow-2-strong" id="img" src="{{ asset($ecoles->Photo) }}" alt="image de {{$ecoles->Nom_Ecole}}">
           </div>
            <h2 style="text-align:center;" class="card-title">   {{$ecoles->Nom_Ecole}}</h2>
            <h5 style="text-align:center;" class="card-title"><span>Academie :</span>   {{$ecoles->Academie}}</h5>
            <h5  style="text-align:center;" class="card-title"><span>Commune :</span>   {{$ecoles->Commune}}</h5>
            <h5  style="text-align:center;" class="card-title"><span>Direction provinciable :</span>   {{$ecoles->Direction_provinciable}}</h5>

@endsection
