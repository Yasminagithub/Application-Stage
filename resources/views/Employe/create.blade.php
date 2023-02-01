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
                        <form action="{{ route('Employe.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Employés</h4>
                            <div class="mb-3">
                                <label>CIN<span style="color:red">*</span></label>
                                <input type="text" name="CIN"  class="form-control" placeholder="Tapez CIN" value="{{old('CIN')}}"/>
                            </div>
                            <span style="color:red">
                                @error('CIN')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Nom<span style="color:red">*</span></label>
                                <input type="text" name="Nom_employe"  class="form-control" placeholder="Tapez nom" value="{{old('Nom_employe')}}" />
                            </div>
                            <span style="color:red">
                                @error('Nom_employe')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Prénom<span style="color:red">*</span></label>
                                <input type="text" name="Prenom_employe"  class="form-control" placeholder="Tapez Prenom" value="{{old('Prenom_employe')}}" />
                            </div>
                            <span style="color:red">
                                @error('Prenom_employe')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Date de Naissance<span style="color:red">*</span></label>
                                <input type="date" name="Date_Naissance" class="form-control" placeholder="Tapez Date de Naissance" value="{{old('Date_Naissance')}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Naissance')
                                    {{$message}}
                                @enderror
                            </span>
                           
                            <div class="mb-3">
                                <label for="phone">Téléphone<span style="color:red">*</span></label>
                                <input type="tel" id="phone" name="Numero_Tel" class="form-control" placeholder="0657121212" pattern="[0-9]{4}[0-9]{6}" value="{{old('Numero_Tel')}}">
                            </div>
                            <span style="color:red">
                                @error('Numero_Tel')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="Email" class="form-control" placeholder="Tapez Email" value="{{old('Email')}}" />
                            </div>
                            <div class="mb-3">
                                <label>Diplôme</label>
                                <input type="text" name="Diplome"  class="form-control" placeholder="Tapez Diplome" value="{{old('Diplome')}}"/>
                            </div>
                            <span style="color:red">
                                @error('Diplome')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Profession<span style="color:red">*</span></label>
                                <select name="Profession"  class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option value="" selected>Choisir Profession</option>
                                    <option value="professeur" @if (old('Profession') == "professeur") {{ 'selected' }}@endif>Professeur</option>
                                    <option value="Directeur" @if (old('Profession') == "Directeur") {{ 'selected' }}@endif>Directeur</option>
                                    <option value="Surveillant_general" @if (old('Profession') == "Surveillant_general") {{ 'selected' }}@endif>Surveillant général</option>
                                    <option value="Femme_de_Menage" @if (old('Profession') == "Femme_de_Menage") {{ 'selected' }}@endif>Femme de Ménage</option>
                                    <option value="securite" @if (old('Profession') == "securite") {{ 'selected' }}@endif>Sécurité</option>
                                    <option value="secretaire" @if (old('Profession') == "secretaire") {{ 'selected' }}@endif>Secrétaire</option>
                                    <option value="econome" @if (old('Profession') == "econome") {{ 'selected' }}@endif>Économe</option>
                                    <option value="Cuisiniere" @if (old('Profession') == "Cuisiniere") {{ 'selected' }}@endif>Cuisinière</option>
                                    <option value="Inspecteur_academie" @if (old('Profession') == "Inspecteur_academie") {{ 'selected' }}@endif>Inspecteur d'académie</option>
                                    <option value="Chauffeur" @if (old('Profession') == "Chauffeur") {{ 'selected' }}@endif>Chauffeur</option>
                                    <option value="Architecte" @if (old('Profession') == "Architecte") {{ 'selected' }}@endif>Architecte</option>
                                    <option value="Peintre" @if (old('Profession') == "Peintre") {{ 'selected' }}@endif>Peintre</option>
                                    <option value="maçon" @if (old('Profession') == "maçon") {{ 'selected' }}@endif>Maçon</option>
                                    <option value="Programmeur" @if (old('Profession') == "Programmeur") {{ 'selected' }}@endif>Programmeur</option>
                                    <option value="plombier" @if (old('Profession') == "plombier") {{ 'selected' }}@endif>plombier</option>
                                    <option value="electricien" @if (old('Profession') == "electricien") {{ 'selected' }}@endif>Électricien</option>

                                </select>
                            </div>
                            <span style="color:red">
                                @error('Profession')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Date d'Entree<span style="color:red">*</span></label>
                                <input type="date" name="Date_Entree" class="form-control" placeholder="Tapez Date d'Entree" value="{{old('Date_Entree')}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Entree')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Numéro CNSS<span style="color:red">*</span></label>
                                <input type="number" name="CNSS" class="form-control" placeholder="Tapez CNSS" value="{{old('CNSS')}}" />
                            </div>
                            <span style="color:red">
                                @error('CNSS')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>salaire Fixe d'employé<span style="color:red">*</span></label>
                                <input type="number" name="salaireFixe"  min="1" max="10000" step="0.01" class="form-control" placeholder="Tapez salaire Fixe d'employe" value="{{old('salaireFixe')}}" />
                            </div>
                            <span style="color:red">
                                @error('salaireFixe')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Adresse<span style="color:red">*</span></label>
                                <input type="text" name="Adresse" class="form-control" placeholder="Tapez Adresse" value="{{old('Adresse')}}" />
                            </div>
                            <span style="color:red">
                                @error('Adresse')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" placeholder="Choisir une image" >
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
