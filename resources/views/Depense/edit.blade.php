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
                        <form action="{{ route('Depense.update',$depense->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Dépense</h4>
                            <h6>Fournisseur<span style="color:red">*</span></h6>
                            <div class="mb-3">
                                <input type="text" id="searchFilter" name="searchFilter" class="form-control" placeholder="Recherche...." onkeyup="filterItems(this);">
                                <select id="ddVehicles" name="fournisseur_id" class="form-control" >
                                    @foreach($fournisseurs as $item)
                                        <option value="{{$item->id}}" {{ $depense->fournisseur->id == $item->id ? 'selected':''}}>{{$item->Nom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Catégorie<span style="color:red">*</span></label>
                                <select name="categorie" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example">
                                    <option selected>{{$depense->categorie}}</option>
                                    <option value="Depense_Courante">Dépense courante</option>
                                    <option value="Achat_Equipement">Achat d'équipement</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Evenement">Événement</option>
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
                                    <option selected>{{$depense->SousCategorie}}</option>
                                    <option value="Eau">Eau</option>
                                    <option value="Electricite">Électricité</option>
                                    <option value="Internet">Internet</option>
                                    <option value="Telephone_Fix">Téléphone fixe</option>
                                    <option value="Telephone_mobile">Téléphone Mobile</option>
                                    <option value="Stationnaire">Stationnaire</option>
                                    <option value="Impression">Impression</option>
                                    <option value="Craie">Craie</option>
                                    <option value="Informatique">Informatique</option>
                                    <option value="Table">Table</option>
                                    <option value="Bureau">Bureau</option>
                                    <option value="Chaise">Chaise</option>
                                    <option value="Equipement_Sport">Équipement sport</option>
                                    <option value="Equipement_Labo">Équipement Laboratoire</option>
                                    <option value="Vehicule">Vehicule</option>
                                    <option value="Peinture">Peinture</option>
                                    <option value="Maconnerie">Maçonnerie</option>
                                    <option value="Logistique">Logistique</option>
                                    <option value="Animation">Animation</option>
                                    <option value="Restauration">Restauration</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('SousCategorie')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Date de dépense<span style="color:red">*</span></label>
                                <input type="date" name="Date_Depense" class="form-control" value="{{$depense->Date_Depense}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Depense')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Heure de dépense</label>
                                <input type="time" name="Heure_Depense"  class="form-control" value="{{$depense->Heure_Depense}}"/>
                            </div>

                            <div class="mb-3">
                                <label>Montant de dépense<span style="color:red">*</span></label>
                                <input type="number" step="0.01" name="Montant_Depense" class="form-control" value="{{$depense->Montant_Depense}}" />
                            </div>
                            <span style="color:red">
                                @error('Montant_Depense')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Description<span style="color:red">*</span></label>
                                <input type="text" name="Description" class="form-control" value="{{$depense->Description}}" />
                            </div>
                            <span style="color:red">
                                @error('Description')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Fichier<span style="color:red">*</span></label>
                                    <input type="file" name="file" class="form-control" id="file" value="{{$depense->file}}">
                            </div>
                            <span style="color:red">
                                @error('file')
                                    {{$message}}
                                @enderror
                            </span>
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
