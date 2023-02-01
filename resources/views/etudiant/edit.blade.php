@extends('dashboard')

@section('title')
    Page Edit
@endsection

@section('content')
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('etudiant.index')}}">Retour</a>
</div>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route('etudiant.update',$etudiant->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Étudiants</h4>
                            <div class="mb-3">
                                <label>CNE<span style="color:red">*</span></label>
                                <input type="text" name="CNE" class="form-control" maxlength = "10" value="{{$etudiant->CNE}}" />
                            </div>
                            <span style="color:red">
                                @error('CNE')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Nom<span style="color:red">*</span></label>
                                <input type="text" name="Nom_Etudiant" class="form-control" value="{{$etudiant->Nom_Etudiant}}" />
                            </div>
                            <span style="color:red">
                                @error('Nom_Etudiant')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Prénom<span style="color:red">*</span></label>
                                <input type="text" name="Prenom_Etudiant" class="form-control" value="{{$etudiant->Prenom_Etudiant}}" />
                            </div>
                            <span style="color:red">
                                @error('Prenom_Etudiant')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Date de naissance<span style="color:red">*</span></label>
                                <input type="date" name="Date_Naissance_Etudiant" class="form-control" value="{{$etudiant->Date_Naissance_Etudiant}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Naissance_Etudiant')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label for="phone">Téléphone</label>
                                <input type="tel" id="phone" name="Nunero_Telephone_Etudiant" class="form-control" pattern="[0-9]{4}[0-9]{6}" value="{{$etudiant->Nunero_Telephone_Etudiant}}">
                            </div>

                            <div class="mb-3">
                                <label>Genre<span style="color:red">*</span></label>
                                <select name="Genre"  class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" >
                                    <option selected>{{$etudiant->Genre}}</option>
                                    <option value="Fille">Fille</option>
                                    <option value="Garcon">Garçon</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Genre')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label for="phone">Téléphone des parents<span style="color:red">*</span></label>
                                <input type="tel" id="phone" name="Telephone_Parent" class="form-control" pattern="[0-9]{4}[0-9]{6}" value="{{$etudiant->Telephone_Parent}}">
                            </div>
                            <span style="color:red">
                                @error('Telephone_Parent')
                                    {{$message}}
                                @enderror
                            </span>

                            
                            <div class="mb-3">
                                <label>Cycle<span style="color:red">*</span></label>
                                <select name="Cycle" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" >
                                    <option selected>{{$etudiant->Cycle}}</option>
                                    <option value="Elementaire">Élémentaire</option>
                                    <option value="Primaire">Primaire</option>
                                    <option value="Collège">Collège</option>
                                    <option value="Lycée">Lycée</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Cycle')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Niveau<span style="color:red">*</span></label>
                                <select name="Niveau" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" >
                                    <option selected>{{$etudiant->Niveau}}</option>
                                    <option value="Première">Première niveau</option>
                                    <option value="deuxième">deuxième niveau</option>
                                    <option value="Troisième">Troisième niveau</option>
                                    <option value="Quatrième">Quatrième niveau</option>
                                    <option value="Cinquième">Cinquième niveau</option>
                                    <option value="Sixième">Sixième niveau</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Niveau')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Groupe<span style="color:red">*</span></label>
                                <select name="Groupe" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" >
                                    <option selected>{{$etudiant->Groupe}}</option>
                                    <option value="groupe 1">Groupe 1</option>
                                    <option value="groupe 2">Groupe 2</option>
                                    <option value="groupe 3">Groupe 3</option>
                                    <option value="groupe 4">Groupe 4</option>
                                    <option value="groupe 5">Groupe 5</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Groupe')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Statut</label>
                                <select name="Statut" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option selected>{{$etudiant->Statut}}</option>
                                    <option value="Actif">Actif</option>
                                    <option value="Inactif">Inactif</option>
                                </select>
                            </div>
                            {{-- <span style="color:red">
                                @error('Statut')
                                    {{$message}}
                                @enderror
                            </span> --}}
                            <div class="mb-3">
                                <label>Nouvelle ecole</label>
                                <input type="text" name="Nouvelle_Ecole" class="form-control" value="{{$etudiant->Nouvelle_Ecole}}" />
                            </div>
                            <!-- <span style="color:red">
                                @error('Nouvelle_Ecole')
                                    {{$message}}
                                @enderror
                            </span> -->
                            <div class="mb-3">
                                <label>Type de paiement<span style="color:red">*</span></label>
                                <select name="TypePaiement" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option selected>{{$etudiant->TypePaiement}}</option>
                                    <option value="Complet">Complet</option>
                                    <option value="Fraterie 2">Fraterie 2</option>
                                    <option value="Fraterie 3">Fraterie 3</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('TypePaiement')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Transport<span style="color:red">*</span></label>
                                <select name="Transport" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option selected>{{$etudiant->Transport}}</option>
                                    <option value="0">OUI</option>
                                    <option value="1">NON</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Transport')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Email<span style="color:red">*</span></label>
                                <input type="text" name="Email_Etudiant" class="form-control" value="{{$etudiant->Email_Etudiant}}"/>
                            </div>
                            <span style="color:red">
                                @error('Email_Etudiant')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" placeholder="Choisir une image"/>
                                <img src="{{ asset($etudiant->photo) }}" width="300px">
                            </div>
                            <!-- <span style="color:red">
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </span> -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
