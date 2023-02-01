@extends('dashboard')

@section('title')
    Page Index
@endsection

@section('content')
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('Ecole.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Ecole.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Ecole</h4>
                            <div class="mb-3">
                                <label>Nom Ecole<span style="color:red">*</span></label>
                                <input type="text" name="Nom_Ecole"  class="form-control" placeholder="Tapez Nom" value="{{old('Nom_Ecole')}}"/>
                            </div>
                            <span style="color:red">
                                @error('Nom_Ecole')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Académie<span style="color:red">*</span></label>
                                <input type="text" name="Academie" class="form-control" placeholder="Tapez Academie" value="{{old('Academie')}}" />
                            </div>
                            <span style="color:red">
                                @error('Academie')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label for="phone">Commune<span style="color:red">*</span></label>
                                <input type="text" name="Commune" class="form-control" placeholder="Tapez Commune"  value="{{old('Commune')}}">
                            </div>
                            <span style="color:red">
                                @error('Commune')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Direction provinciable<span style="color:red">*</span></label>
                                <input type="text" name="Direction_provinciable"  class="form-control" placeholder="Tapez Direction provinciable" value="{{old('Direction_provinciable')}}"/>
                            </div>
                            <span style="color:red">
                                @error('Direction_provinciable')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" name="Photo" class="form-control" placeholder="Choisir une image" >
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
