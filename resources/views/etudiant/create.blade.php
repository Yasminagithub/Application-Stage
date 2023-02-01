@extends('dashboard')

@section('title')
    Page Index
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
                        <form action="{{ route('etudiant.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Étudiants</h4>
                            <div class="mb-3">
                                <label>CNE<span style="color:red">*</span></label>
                                <input type="text" name="CNE" class="form-control" placeholder="Tapez CNE" value="{{old('CNE')}}"/>
                            </div>
                            <span style="color:red">
                                @error('CNE')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Nom<span style="color:red">*</span></label>
                                <input type="text" name="Nom_Etudiant" class="form-control" placeholder="Tapez Nom" value="{{old('Nom_Etudiant')}}" />
                            </div>
                            <span style="color:red">
                                @error('Nom_Etudiant')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Prénom<span style="color:red">*</span></label>
                                <input type="text" name="Prenom_Etudiant" class="form-control" placeholder="Tapez Prénom" value="{{old('Prenom_Etudiant')}}" />
                            </div>
                            <span style="color:red">
                                @error('Prenom_Etudiant')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Date de naissance<span style="color:red">*</span></label>
                                <input type="date" name="Date_Naissance_Etudiant"  class="form-control" placeholder="Tapez Date de naissance" value="{{old('Date_Naissance_Etudiant')}}"/>
                            </div>
                            <span style="color:red">
                                @error('Date_Naissance_Etudiant')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">

                                {{-- <label>Téléphone</label>
                                <input type="text" name="Nunero_Telephone_Etudiant" class="form-control" placeholder="Tapez téléphone" value="{{old('Nunero_Telephone_Etudiant')}}" /> --}}
                                <label for="phone">Téléphone</label>
                                <input type="tel" id="phone" name="Nunero_Telephone_Etudiant" class="form-control" placeholder="0657121212" pattern="[0-9]{4}[0-9]{6}" value="{{old('Nunero_Telephone_Etudiant')}}">
                            </div>


                            <div class="mb-3">
                                <label>Genre<span style="color:red">*</span></label>
                                <select name="Genre"  class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" >
                                    <option value="" selected>Choisir un genre</option>
                                    <option value="Fille" @if (old('Genre') == "Fille") {{ 'selected' }} @endif>Fille</option>
                                    <option value="Garcon" @if (old('Genre') == "Garcon") {{ 'selected' }} @endif>Garçon</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Genre')
                                    {{$message}}
                                @enderror
                            </span>
                            {{-- <span style="color:red">
                                @error('Genre')
                                    {{$message}}
                                @enderror
                            </span> --}}

                            <div class="mb-3">

                                <label for="phone">Téléphone des parents<span style="color:red">*</span></label>
                                <input type="tel" id="phone" name="Telephone_Parent" class="form-control" placeholder="0657121212" pattern="[0-9]{4}[0-9]{6}" value="{{old('Telephone_Parent')}}">
                            </div>
                            <span style="color:red">
                                @error('Telephone_Parent')
                                    {{$message}}
                                @enderror
                            </span>


                            <div class="mb-3">
                                <label>Cycle<span style="color:red">*</span></label>
                                <select name="Cycle"  class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" >
                                    <option value="" selected>Choisir un cycle</option>
                                    <option value="Elementaire" @if (old('Cycle') == "Elementaire") {{ 'selected' }} @endif>Élémentaire</option>
                                    <option value="Primaire" @if (old('Cycle') == "Primaire") {{ 'selected' }} @endif>Primaire</option>
                                    <option value="College"  @if (old('Cycle') == "College") {{ 'selected' }} @endif>Collège</option>
                                    <option value="Lycee"  @if (old('Cycle') == "Lycee") {{ 'selected' }} @endif>Lycée</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Cycle')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Niveau<span style="color:red">*</span></label>
                                <select name="Niveau"  class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option value="" selected>Choisir niveau</option>
                                    <option value="Premiere" @if (old('Niveau') == "Premiere") {{ 'selected' }}@endif>Première niveau</option>
                                    <option value="deuxieme" @if (old('Niveau') == "deuxieme") {{ 'selected' }}@endif>deuxième niveau</option>
                                    <option value="Troisieme" @if (old('Niveau') == "Troisieme") {{ 'selected' }}@endif>Troisième niveau</option>
                                    <option value="Quatrieme" @if (old('Niveau') == "Quatrieme") {{ 'selected' }}@endif>Quatrième niveau</option>
                                    <option value="Cinquieme" @if (old('Niveau') == "Cinquieme") {{ 'selected' }}@endif>Cinquième niveau</option>
                                    <option value="Sixieme" @if (old('Niveau') == "Sixieme") {{ 'selected' }}@endif>Sixième niveau</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Niveau')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                            <label>Groupe<span style="color:red">*</span></label>
                                <select name="Groupe" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option value="" selected>Choisir groupe</option>
                                    <option value="groupe 1" @if (old('Groupe') == "groupe 1") {{ 'selected' }}@endif>Groupe 1</option>
                                    <option value="groupe 2" @if (old('Groupe') == "groupe 2") {{ 'selected' }}@endif>Groupe 2</option>
                                    <option value="groupe 3" @if (old('Groupe') == "groupe 3") {{ 'selected' }}@endif>Groupe 3</option>
                                    <option value="groupe 4" @if (old('Groupe') == "groupe 4") {{ 'selected' }}@endif>Groupe 4</option>
                                    <option value="groupe 5" @if (old('Groupe') == "groupe 5") {{ 'selected' }}@endif>Groupe 5</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Groupe')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Type de Paiement<span style="color:red">*</span></label>
                                <select name="TypePaiement" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" value="{{old('TypePaiement')}}">
                                    <option value="" selected>Choisir le type de paiement</option>
                                    <option value="Complet" @if (old('TypePaiement') == "Complet") {{ 'selected' }}@endif>Complet</option>
                                    <option value="Fraterie 2" @if (old('TypePaiement') == "Fraterie 2") {{ 'selected' }}@endif>Fraterie 2</option>
                                    <option value="Fraterie 3" @if (old('TypePaiement') == "Fraterie 3") {{ 'selected' }}@endif>Fraterie 3</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('TypePaiement')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Transport<span style="color:red">*</span></label>
                                <select name="Transport" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" value="{{old('Transport')}}">
                                    <option value="" selected>L'etudiant profite du transport ? </option>
                                    <option value="OUI" @if (old('Transport') == "OUI") {{ 'selected' }}@endif>OUI</option>
                                    <option value="NON" @if (old('Transport') == "NON") {{ 'selected' }}@endif>NON</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Transport')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="Email_Etudiant" class="form-control" placeholder="Tapez Email" value="{{old('Email_Etudiant')}}" />
                            </div>

                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" placeholder="Choisir une image" value="{{old('photo')}}" >
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
