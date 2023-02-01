@extends('dashboard')

@section('title')
    Page Index Transport
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
                        <h4>Liste des matériels de transport
                        @can('Transport-create')
                            <a href="{{route('Transport.create')}}" class="btn btn-primary float-end"><i class="bi bi-plus-square-fill"></i>Ajouter matériel de transport</a>
                        @endcan
                            <a href="{{route('Kilometrage.index')}}" class="btn btn-secondary float-end">kilométrage des matériels de transport</a>
                        </h4>

                        <br>
                        <br>
                        <table class="table" id="myTable">
                            <thead class="table-success">
                            <tr>
                                <th>Nom d'employé</th>
                                <th>Prénom d'employé</th>
                                <th>Immatriculation</th>
                                <th>Marque</th>
                                <th>Date fin de Vignette</th>
                                <th>Opération</th>
                            </tr>
                            </thead>
                            <tbody id="yaya">
                            @foreach($transports as $item)
                                <tr>
                                    <td>{{$item->employe->Nom_employe}}</td>
                                    <td>{{$item->employe->Prenom_employe}}</td>
                                    <td>{{$item->Immatriculation}}</td>
                                    <td>{{$item->Marque}}</td>
                                    <td>{{$item->Date_fin_Vignette}}</td>
                                    <td>
                                    @can('Transport-edit')
                                        <a class="btn btn-primary" href="{{route('Transport.edit',$item->id)}}" role="button">Modifier</a>
                                    @endcan
                                    @can('Transport-list')
                                        <a class="btn btn-warning" href="{{route('Transport.show',$item->id)}}" role="button"><i class="bi bi-eye-fill"></i>Voir</a>
                                    @endcan
                                    @can('Transport-delete')
                                    <form  action="{{route('Transport.destroy',$item->id)}}" method="POST">
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
