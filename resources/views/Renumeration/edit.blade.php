@extends('dashboard')

@section('title')
    Page Edit Renumeration
@endsection

@section('content')
<div class="text-center">
    <a  class="btn btn-primary" href="{{route('Renumeration.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action= "{{ route('Renumeration.update',$renumeration->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Employe<span style="color:red">*</span></h4>
                            <div class="mb-3">
                        <input type="text" id="searchFilter" name="searchFilter" class="form-control" placeholder="Recherche...." onkeyup="filterItems(this);">
                                <!--<label>Selectionner le CNE</label>-->
                                <select id="ddVehicles" name="employe_id" class="form-control" >
                                    @foreach($employes as $item)
                                        <option value="{{$item->id}}" {{$renumeration->employe->id == $item->id ? 'selected':''}}>{{$item->Nom_employe}} {{$item->Prenom_employe}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Type de rémunération<span style="color:red">*</span></label>
                                <select name="Type_renumeration" class="form-select form-control @error('gender') is-invalid @enderror" aria-label=".form-select-lg example" value="{{old('Type_renumeration')}}">
                                    <option selected>{{$renumeration->Type_renumeration}}</option>
                                    <option value="Salaire">Salaire</option>
                                    <option value="Prime">Prime</option>
                                </select>
                            </div>
                            <span style="color:red">
                                @error('Type_renumeration')
                                    {{$message}}
                                @enderror
                            </span>

                            <div class="mb-3">
                                <label>Valeur de rémunération<span style="color:red">*</span></label>
                                <input type="text" name="Valeur_renumeration"  class="form-control" value="{{ $renumeration->Valeur_renumeration }}"/>
                                    <span style="color:red">
                                        @error('Valeur_renumeration')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>
                            <div class="mb-3">
                                <label>Date de rémunération<span style="color:red">*</span></label>
                                <input type="date" name="Date_renumeration"  class="form-control" value="{{ $renumeration->Date_renumeration }}"/>
                                    <span style="color:red">
                                        @error('Date_renumeration')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>

                             <div class="mb-3">
                                <label>Date de<span style="color:red">*</span></label>
                                <input type="date" name="DateFrom"  class="form-control" value="{{ $renumeration->DateFrom }}"/>
                                    <span style="color:red">
                                        @error('DateFrom')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>

                            <div class="mb-3">
                                <label>Date À<span style="color:red">*</span></label>
                                <input type="date" name="DateTo"  class="form-control" value="{{ $renumeration->DateTo }}"/>
                                    <span style="color:red">
                                        @error('DateTo')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>
                            
                            <div class="mb-3">
                                {{-- <input type="submit" value="Enregistrer" class="btn btn-primary"> --}}
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
