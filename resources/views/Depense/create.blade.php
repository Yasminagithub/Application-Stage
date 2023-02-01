@extends('dashboard')

@section('title')
    Page Index Depense
@endsection

@section('content')
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('Depense.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Depense.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Dépense</h4>
                            <h6>Fournisseur</h6>
                            <div class="mb-3">
                                <input type="text" id="searchFilter" name="searchFilter" class="form-control" placeholder="Recherche...." onkeyup="filterItems(this);">
                                <select id="ddVehicles" name="fournisseur_id" class="form-control" >
                                    @foreach($fournisseurs as $item)
                                        <option value="{{$item->id}}">{{$item->Nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Catégorie<span style="color:red">*</span></label>
                                <select name="categorie" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option value="" selected>Choisir une catégorie</option>
                                    <option value="Depense_Courante" @if (old('categorie') == "Depense_Courante") {{ 'selected' }} @endif>Dépense courante</option>
                                    <option value="Achat_Equipement" @if (old('categorie') == "Achat_Equipement") {{ 'selected' }} @endif>Achat d'équipement</option>
                                    <option value="Maintenance" @if (old('categorie') == "Maintenance") {{ 'selected' }} @endif>Maintenance</option>
                                    <option value="Evenement" @if (old('categorie') == "Evenement") {{ 'selected' }} @endif>Événement</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('categorie')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Sous Catégorie<span style="color:red">*</span></label>
                                <select name="SousCategorie" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option value="" selected>Choisir une sous-catégorie</option>
                                    <option value="Eau" @if (old('SousCategorie') == "Eau") {{ 'selected' }} @endif>Eau</option>
                                    <option value="Electricite" @if (old('SousCategorie') == "Electricite") {{ 'selected' }} @endif>Électricité</option>
                                    <option value="Internet" @if (old('SousCategorie') == "Internet") {{ 'selected' }} @endif>Internet</option>
                                    <option value="Telephone_Fix" @if (old('SousCategorie') == "Telephone_Fix") {{ 'selected' }} @endif>Téléphone fixe</option>
                                    <option value="Telephone_mobile" @if (old('SousCategorie') == "Telephone_mobile") {{ 'selected' }} @endif>Téléphone Mobile</option>
                                    <option value="Stationnaire" @if (old('SousCategorie') == "Stationnaire") {{ 'selected' }} @endif>Stationnaire</option>
                                    <option value="Impression" @if (old('SousCategorie') == "Impression") {{ 'selected' }} @endif>Impression</option>
                                    <option value="Craie" @if (old('SousCategorie') == "Craie") {{ 'selected' }} @endif>Craie</option>
                                    <option value="Informatique" @if (old('SousCategorie') == "Informatique") {{ 'selected' }} @endif>Informatique</option>
                                    <option value="Table" @if (old('SousCategorie') == "Table") {{ 'selected' }} @endif>Table</option>
                                    <option value="Bureau" @if (old('SousCategorie') == "Bureau") {{ 'selected' }} @endif>Bureau</option>
                                    <option value="Chaise" @if (old('SousCategorie') == "Chaise") {{ 'selected' }} @endif>Chaise</option>
                                    <option value="Equipement_Sport" @if (old('SousCategorie') == "Equipement_Sport") {{ 'selected' }} @endif>Équipement sport</option>
                                    <option value="Equipement_Labo" @if (old('SousCategorie') == "Equipement_Labo") {{ 'selected' }} @endif>Équipement Laboratoire</option>
                                    <option value="Vehicule" @if (old('SousCategorie') == "Vehicule") {{ 'selected' }} @endif>Vehicule</option>
                                    <option value="Peinture" @if (old('SousCategorie') == "Peinture") {{ 'selected' }} @endif>Peinture</option>
                                    <option value="Maconnerie" @if (old('SousCategorie') == "Maconnerie") {{ 'selected' }} @endif>Maçonnerie</option>
                                    <option value="Logistique" @if (old('SousCategorie') == "Logistique") {{ 'selected' }} @endif>Logistique</option>
                                    <option value="Animation" @if (old('SousCategorie') == "Animation") {{ 'selected' }} @endif>Animation</option>
                                    <option value="Restauration" @if (old('SousCategorie') == "Restauration") {{ 'selected' }} @endif>Restauration</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('SousCategorie')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Date de dépense<span style="color:red">*</span></label>
                                <input type="date" name="Date_Depense" class="form-control" placeholder="Tapez Date de depense" value="{{old('Date_Depense')}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Depense')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Heure de dépense</label>
                                <input type="time" name="Heure_Depense"  class="form-control" placeholder="Tapez Heure de depense" value="{{old('Heure_Depense')}}"/>
                            </div>

                            <div class="mb-3">
                                <label>Montant de dépense<span style="color:red">*</span></label>
                                <input type="number" step="0.01" name="Montant_Depense" class="form-control" placeholder="Tapez Montant de Depense" value="{{old('Montant_Depense')}}" />
                            </div>
                            <span style="color:red">
                                @error('Montant_Depense')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Description<span style="color:red">*</span></label>
                                <input type="text" name="Description" class="form-control" placeholder="Tapez description" value="{{old('Description')}}" />
                            </div>
                            <span style="color:red">
                                @error('Description')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Fichier<span style="color:red">*</span></label>
                                    <input type="file" name="file" class="form-control" placeholder="Choisir un fichier" id="file">
                                      @error('file')
                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                      @enderror

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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
