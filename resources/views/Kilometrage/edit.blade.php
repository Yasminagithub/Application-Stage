@extends('dashboard')

@section('title')
    Page Index
@endsection

@section('content')
<div class="text-center">
    <a  class="btn btn-primary" href="{{route('Kilometrage.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Kilometrage.update',$kilometrage->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Kilometrage</h4>
                            <div class="mb-3">
                            <h6>Materiel de transport</h6>
                        <input type="text" id="searchFilter" name="searchFilter" class="form-control" placeholder="Recherche...." onkeyup="filterItems(this);">
                                <!--<label>Selectionner le CNE</label>-->
                                <select id="ddVehicles" name="transport_id" class="form-control" >
                                    @foreach($transports as $item)
                                        <option value="{{$item->id}}" {{$kilometrage->transport->id == $item->id ? 'selected':''}}>{{$item->Immatriculation}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Kilometrage (Km)<span style="color:red">*</span></label>
                                <input type="number" name="Kilometrage" step="0.01" class="form-control" value="{{ $kilometrage->Kilometrage }}"/>
                                    <span style="color:red">
                                        @error('Kilometrage')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>

                            <div class="mb-3">
                                <label>Date de Kilometrage<span style="color:red">*</span></label>
                                <input type="date" name="Date_Kilometrage"  class="form-control" value="{{ $kilometrage->Date_Kilometrage }}"/>
                                    <span style="color:red">
                                        @error('Date_Kilometrage')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>
                            <div class="mb-3">
                                <label>Heure de Kilometrage<span style="color:red">*</span></label>
                                <input type="time" name="Heure_Kilo"  class="form-control" value="{{ $kilometrage->Heure_Kilo }}"/>
                                <span style="color:red">
                                    @error('Heure_Kilo')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label>Commentaire de Kilometrage<span style="color:red">*</span></label>
                                <input type="text" name="Commentaire_Kilometrage"  class="form-control" value="{{ $kilometrage->Commentaire_Kilometrage }}"/>
                                    <span style="color:red">
                                        @error('Commentaire_Kilometrage')
                                            {{$message}}
                                        @enderror
                                    </span>
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
