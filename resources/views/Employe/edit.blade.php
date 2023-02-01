@extends('dashboard')

@section('title')
    Page Index
@endsection

@section('content')
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('Employe.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Employe.update',$employe->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Employés</h4>
                            <div class="mb-3">
                                <label>CIN</label>
                                <input type="text" name="CIN"  class="form-control" value="{{$employe->CIN}}"/>
                            </div>
                            <span style="color:red">
                                @error('CIN')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Nom<span style="color:red">*</span></label>
                                <input type="text" name="Nom_employe"  class="form-control" value="{{$employe->Nom_employe}}" />
                            </div>
                            <span style="color:red">
                                @error('Nom_employe')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Prénom<span style="color:red">*</span></label>
                                <input type="text" name="Prenom_employe"  class="form-control" value="{{$employe->Prenom_employe}}" />
                            </div>
                            <span style="color:red">
                                @error('Prenom_employe')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Date de Naissance<span style="color:red">*</span></label>
                                <input type="date" name="Date_Naissance" class="form-control" value="{{$employe->Date_Naissance}}"/>
                            </div>
                            <span style="color:red">
                                @error('Date_Naissance')
                                    {{$message}}
                                @enderror
                            </span>
                          
                            <div class="mb-3">
                                <label for="phone">Téléphone<span style="color:red">*</span></label>
                                <input type="tel" id="phone" name="Numero_Tel" class="form-control" placeholder="0657121212" pattern="[0-9]{4}[0-9]{6}" value="{{$employe->Numero_Tel}}">
                            </div>
                            <span style="color:red">
                                @error('Numero_Tel')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="Email" class="form-control" value="{{$employe->Email}}" />
                            </div>
                            <div class="mb-3">
                                <label>Diplôme</label>
                                <input type="text" name="Diplome"  class="form-control" value="{{$employe->Diplome}}"/>
                            </div>

                            <div class="mb-3">
                                <label>Profession<span style="color:red">*</span></label>
                                <select name="Profession"  class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option selected>{{$employe->Profession}}</option>
                                    <option value="professeur">Professeur</option>
                                    <option value="Directeur">Directeur</option>
                                    <option value="Surveillant_general">Surveillant général</option>
                                    <option value="Femme_de_Menage">Femme de Ménage</option>
                                    <option value="securite">Sécurité</option>
                                    <option value="secretaire">Secrétaire</option>
                                    <option value="econome">Économe</option>
                                    <option value="Cuisiniere">Cuisinière</option>
                                    <option value="Inspecteur_academie">Inspecteur d'académie</option>
                                    <option value="Chauffeur">Chauffeur</option>
                                    <option value="Architecte">Architecte</option>
                                    <option value="Peintre">Peintre</option>
                                    <option value="maçon">Maçon</option>
                                    <option value="Programmeur">Programmeur</option>
                                    <option value="plombier">plombier</option>
                                    <option value="electricien">Électricien</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Profession')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Date d'Entree<span style="color:red">*</span></label>
                                <input type="date" name="Date_Entree" class="form-control" value="{{$employe->Date_Entree}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Entree')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Date de Sortie</label>
                                <input type="date" name="Date_Sortie" class="form-control"  value="{{$employe->Date_Sortie}}" />
                            </div>
                            <!-- <span style="color:red">
                                @error('Date_Sortie')
                                    {{$message}}
                                @enderror
                            </span> -->
                            <div class="mb-3">
                                <label>Statut</label>
                                <select name="Statut" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" value="{{old('Statut')}}">
                                    <option selected>{{$employe->Statut}}</option>
                                    <option value="Actif">Actif</option>
                                    <option value="Inactif">Inactif</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>CNSS<span style="color:red">*</span></label>
                                <input type="number" name="CNSS" class="form-control" value="{{$employe->CNSS}}" />
                            </div>
                            <span style="color:red">
                                @error('CNSS')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>salaire Fixe d'employé<span style="color:red">*</span></label>
                                <input type="number" name="salaireFixe"  min="1" max="10000" step="0.01" class="form-control"  value="{{$employe->salaireFixe}}" />
                            </div>
                            <span style="color:red">
                                @error('salaireFixe')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Adresse<span style="color:red">*</span></label>
                                <input type="text" name="Adresse" class="form-control"  value="{{$employe->Adresse}}" />
                            </div>
                            <span style="color:red">
                                @error('Adresse')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" placeholder="Choisir une image" >
                                <img src="{{ asset($employe->photo) }}" width="300px">
                            </div>
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
