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
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen">Fiche Frais</h4></div>
            <p class="card-text"><span>Nom d'étudiant :</span>  {{ $frais->etudiant->Nom_Etudiant}}</p>
            <p class="card-text"><span>Prénom d'étudiant :</span>  {{ $frais->etudiant->Prenom_Etudiant}}</p>
            <p class="card-text"><span>Cycle d'étudiant :</span>  {{ $frais->etudiant->Cycle}}</p>
            <p class="card-text"><span>Niveau d'étudiant :</span>  {{ $frais->etudiant->Niveau}}</p>
            <p class="card-text"><span>Groupe d'étudiant :</span>  {{ $frais->etudiant->Groupe}}</p>
            <p class="card-text"><span>Montant de Paiement :</span>  {{ $frais->MontantPaiement}}</p>
            <p class="card-text"><span>Date de paiement :</span>   {{ $frais->DatePaiement}}</p>
            <p class="card-text"><span>Date De :</span>   {{ $frais->DateFrom}}</p>
            <p class="card-text"><span>Date A :</span>   {{ $frais->DateTo}}</p>

            <div class="col-md-12">
                <a class="btn btn-warning btn-lg float-end" href="{{ route('Frais.pdf',$frais->id)}}"role="button">Télécharger PDF</a>
            </div>
     </div>
@endsection
