@extends('dashboard')

@section('title')
    Page Index Frais
@endsection

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('message'))
                  <h4 class="alert alert-success">{{session('message')}}</h4>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des frais des étudiants
                            <a href="{{route('etudiant.index')}}" class="btn btn-primary float-end">Retour</a>
                        @can('Frais-create')
                            <a href="{{route('Frais.create')}}" class="btn btn-secondary float-end"><i class="bi bi-plus-square-fill"></i>Ajouter Frais d'étudiant</a>
                        @endcan
                        </h4>

                        <br>
                        <br>
                        <table class="table" id="myTable">
                            <thead class="table-success">
                                <tr>
                                    <th>Nom d'étudiant</th>
                                    <th>Prénom d'étudiant</th>
                                    <th>Cycle d'étudiant</th>
                                    <th>Niveau d'étudiant</th>
                                    <th>Groupe d'étudiant</th>
                                    <th>Montant de Paiement</th>
                                    <th>Date de paiement</th>
                                    <th>Opération</th>
                                </tr>
                            </thead>
                            <tbody id="yaya">
                                @foreach($frais as $item)
                                    <tr>
                                        <td>{{$item->etudiant->Nom_Etudiant}}</td>
                                        <td>{{$item->etudiant->Prenom_Etudiant}}</td>
                                        <td>{{$item->etudiant->Cycle}}</td>
                                        <td>{{$item->etudiant->Niveau}}</td>
                                        <td>{{$item->etudiant->Groupe}}</td>
                                        <td>{{$item->MontantPaiement}}</td>
                                        <td>{{$item->DatePaiement}}</td>
                                        <td>
                                        @can('Frais-edit')
                                            <a class="btn btn-primary" href="{{route('Frais.edit',$item->id)}}" role="button">Modifier</a>
                                        @endcan
                                        @can('Frais-list')
                                            <a class="btn btn-warning" href="{{route('Frais.show',$item->id)}}" role="button"><i class="bi bi-eye-fill"></i>Voir</a>
                                        @endcan
                                        @can('Frais-delete')
                                         <form  action="{{route('Frais.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            {{method_field('delete')}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="bi bi-trash text-light"></i> Supprimer</button>
                                        </form>
                                        @endcan


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Voulez-vous vraiment supprimer cet enregistrement ?",
                text: "Si vous le supprimez, il disparaîtra pour toujours.",
                icon: "warning",
                type: "warning",
                buttons: ["Annuler","Oui!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>

@endsection
