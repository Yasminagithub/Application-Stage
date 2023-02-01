@extends('dashboard')

@section('title')
    Page Create Trasnsport
@endsection

@section('content')
<div class="text-center">
        <a  class="btn btn-primary" href="{{ route('Transport.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('Transport.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Matériel de transport</h4>
                            <h4>Employe<span style="color:red">*</span></h4>
                            <div class="mb-3">
                            <input type="text" id="searchFilter" name="searchFilter" class="form-control" placeholder="Recherche...." onkeyup="filterItems(this);">
                                <!--<label>Selectionner le CNE</label>-->
                                <select id="ddVehicles" name="employe_id" class="form-control" >
                                    @foreach($employes as $item)
                                        <option value="{{$item->id}}" >{{$item->Nom_employe}} {{$item->Prenom_employe}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Immatriculation<span style="color:red">*</span></label>
                                <input type="text" name="Immatriculation"  class="form-control" placeholder="Tapez l'immatriculation" value="{{old('Immatriculation')}}"/>
                                <span style="color:red">
                                    @error('Immatriculation')
                                        {{$message}}
                                    @enderror
                                </span>

                            <div class="mb-3">
                                <label>Marque<span style="color:red">*</span></label>
                                <input type="text" name="Marque"  class="form-control" placeholder="Tapez Marque" value="{{old('Marque')}}" />
                            </div>
                            <span style="color:red">
                                @error('Marque')
                                    {{$message}}
                                @enderror
                            </span>

                            <h4>Detail des visites</h4>
                            <div class="mb-3">
                                <label>Date fin de Vignette<span style="color:red">*</span></label>
                                <input type="date" name="Date_fin_Vignette" class="form-control" placeholder="Tapez Vignette" value="{{old('Date_fin_Vignette')}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_fin_Vignette')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Date de Debut d'assurance <span style="color:red">*</span></label>
                                <input type="date" name="Date_Visite_Assurance_Debut" class="form-control" placeholder="Tapez Date de la Visite assurance Debut" value="{{old('Date_Visite_Assurance_Debut')}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Visite_Assurance_Debut')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Date de fin d'assurance<span style="color:red">*</span></label>
                                <input type="date" name="Date_Visite_Assurance_Fin"  class="form-control" placeholder="Tapez Date de la Visite assurance Fin" value="{{old('Date_Visite_Assurance_Fin')}}"/>
                            </div>
                            <span style="color:red">
                                @error('Date_Visite_Assurance_Fin')
                                    {{$message}}
                                @enderror
                            </span>
                            <div class="mb-3">
                                <label>Date de la Visite technique Fin<span style="color:red">*</span></label>
                                <input type="date" name="Date_Visite_technique_Fin" class="form-control" placeholder="Tapez Date de la Visite technique Fin" value="{{old('Date_Visite_technique_Fin')}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Visite_technique_Fin')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Date de la Visite equipement Fin<span style="color:red">*</span></label>
                                <input type="date" name="Date_Visite_equipement_Fin" class="form-control" placeholder="Tapez Date de la Visite equipement Fin" value="{{old('Date_Visite_equipement_Fin')}}" />
                            </div>
                            <span style="color:red">
                                @error('Date_Visite_equipement_Fin')
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
    <script>
        var optionsCache = [];

        function filterItems(el) {
        var value = el.value.toLowerCase();
        var form = el.form;
        var opt, sel = form.ddVehicles;
        if (value == '') {
            restoreOptions();
        } else {
                // Loop backwards through options as removing them modifies the next
                // to be visited if go forwards
                for (var i=sel.options.length-1; i>=0; i--) {
                    opt = sel.options[i];
                        if (opt.text.toLowerCase().indexOf(value) == -1){
                            sel.removeChild(opt)
                        }
                    }
            }
        }
        // Restore select to original state
        function restoreOptions(){
        var sel = document.getElementById('ddVehicles');
        sel.options.length = 0;
            for (var i=0, iLen=optionsCache.length; i<iLen; i++) {
                sel.appendChild(optionsCache[i]);
            }
        }


        window.onload = function() {
        // Load cache
        var sel = document.getElementById('ddVehicles');
        for (var i=0, iLen=sel.options.length; i<iLen; i++) {
            optionsCache.push(sel.options[i]);
        }
        }
</script>
@endsection
