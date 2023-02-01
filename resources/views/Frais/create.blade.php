@extends('dashboard')

@section('title')
    Page Frais
@endsection

@section('content')
<div class="text-center">
    <a  class="btn btn-primary" href="{{route('Frais.index')}}">Retour</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('Frais.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4>Étudiant<span style="color:red">*</span></h4>
                            <div class="mb-3">
                                <input type="text" id="searchFilter" name="searchFilter" class="form-control" placeholder="Recherche...." onkeyup="filterItems(this);">
                                <!--<label>Selectionner le CNE</label>-->
                                <select id="ddVehicles" name="etudiant_id" class="form-control" >
                                    @foreach($etudiants as $item)
                                        <option value="{{$item->id}}">{{$item->Nom_Etudiant}} {{$item->Prenom_Etudiant}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Montant de paiement<span style="color:red">*</span></label>
                                <input type="number" min="1" max="5000" step="0.01" name="MontantPaiement"  class="form-control" placeholder="Tapez le montant de paiement" value="{{old('MontantPaiement')}}"/>
                                    <span style="color:red">
                                        @error('MontantPaiement')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>

                            <div class="mb-3">
                                <label>Date de paiement<span style="color:red">*</span></label>
                                <input type="date" name="DatePaiement"  class="form-control" placeholder="Tapez la Date de Paiement" value="{{old('DatePaiement')}}"/>
                                    <span style="color:red">
                                        @error('DatePaiement')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>

                            <div class="mb-3">
                                <label>Date De<span style="color:red">*</span></label>
                                <input type="date" name="DateFrom"  class="form-control" placeholder="Tapez la Date De" value="{{old('DateFrom')}}"/>
                                    <span style="color:red">
                                        @error('DateFrom')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>

                            <div class="mb-3">
                                <label>Date À<span style="color:red">*</span></label>
                                <input type="date" name="DateTo"  class="form-control" placeholder="Tapez la Date a " value="{{old('DateTo')}}"/>
                                    <span style="color:red">
                                        @error('DateTo')
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
