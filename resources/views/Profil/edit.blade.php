@extends('dashboard')

@section('title')
    Page Create Profil
@endsection

@section('content')
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('Profil.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Profil.update',$profil->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Profil</h4>
                            <div class="mb-3">
                                <label>Nom<span style="color:red">*</span></label>
                                <input type="text" name="nom" class="form-control" value="{{ $profil->nom }}"/>
                            </div>
                            <span style="color:red">
                                @error('nom')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Prénom<span style="color:red">*</span></label>
                                <input type="text" name="Prenom" class="form-control" value="{{ $profil->Prenom }}" />
                            </div>
                            <span style="color:red">
                                @error('Prenom')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="Email" class="form-control" value="{{ $profil->Email }}">
                            </div>

                            <div class="mb-3">
                                <label>Adresse<span style="color:red">*</span></label>
                                <input type="text" name="Adresse"  class="form-control" value="{{ $profil->Adresse }}"/>
                            </div>
                            <span style="color:red">
                                @error('Adresse')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" name="Photo" class="form-control" placeholder="Choisir une image" >
                                <img src="{{ asset($profil->Photo) }}" width="300px">
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
