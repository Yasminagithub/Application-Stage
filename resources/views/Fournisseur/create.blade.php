@extends('dashboard')

@section('title')
    Page Index
@endsection

@section('content')
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('Fournisseur.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Fournisseur.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Fournisseur</h4>
                            <div class="mb-3">
                                <label>Nom<span style="color:red">*</span></label>
                                <input type="text" name="Nom"  class="form-control" placeholder="Tapez Nom" value="{{old('Nom')}}"/>
                            </div>
                            <span style="color:red">
                                @error('Nom')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Numéro bancaire</label>
                                <input type="text" name="Numero_Bancaire" class="form-control" placeholder="Tapez Numero Bancaire" value="{{old('Numero_Bancaire')}}" />
                            </div>

                            <div class="mb-3">
                                <label for="phone">Téléphone<span style="color:red">*</span></label>
                                <input type="tel" id="phone" name="Telephone" class="form-control" placeholder="0657121212" pattern="[0-9]{4}[0-9]{6}" value="{{old('Telephone')}}">
                            </div>
                            <span style="color:red">
                                @error('Telephone')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="Email" class="form-control" placeholder="Tapez Email" value="{{old('Email')}}" />
                            </div>

                            <div class="mb-3">
                                <label>Description<span style="color:red">*</span></label>
                                <input type="text" name="Description"  class="form-control" placeholder="Tapez Description" value="{{old('Description')}}"/>
                            </div>
                            <span style="color:red">
                                @error('Description')
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
