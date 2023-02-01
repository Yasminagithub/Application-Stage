@extends('dashboard')

@section('title')
    Page Index
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
                        <h4>Liste des Dépenses
                        @can('Depense-create')
                            <a href="{{route('Depense.create')}}" class="btn btn-primary float-end"><i class="bi bi-plus-square-fill"></i>Ajouter Depense</a>
                        @endcan
                        </h4>

                        <br>
                        <br>
                        <table class="table" id="myTable">
                            <thead class="table-success">
                            <tr>
                                <th>Nom Fournisseur</th>
                                <th>Catégorie</th>
                                <th>Sous Catégorie</th>
                                <th>Date de dépense</th>
                                <th>Montant de dépense</th>
                                <th>Description de dépense</th>
                                <th>Opération</th>
                                {{-- <th>Voir fichier</th> --}}
                                <th>Télécharger fichier</th>
                            </tr>
                            </thead>
                            <tbody id="yaya">
                                @foreach($depenses as $item)
                                <tr>
                                    <td>{{$item->fournisseur->Nom}}</td>
                                    <td>{{$item->categorie}}</td>
                                    <td>{{$item->SousCategorie}}</td>
                                    <td>{{$item->Date_Depense}}</td>
                                    <td>{{$item->Montant_Depense}}</td>
                                    <td>{{$item->Description}}</td>
                                    <td>
                                    @can('Depense-edit')
                                        <a class="btn btn-primary" href="{{route('Depense.edit',$item->id)}}" role="button">Modifier</a>
                                    @endcan
                                    @can('Depense-list')
                                        <a class="btn btn-warning" href="{{route('Depense.show',$item->id)}}" role="button"><i class="bi bi-eye-fill"></i>Voir</a>
                                    @endcan
                                    @can('Depense-delete')
                                    <form  action="{{route('Depense.destroy',$item->id)}}" method="POST">
                                        @csrf
                                        {{method_field('delete')}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="bi bi-trash text-light"></i> Supprimer</button>
                                    </form>
                                    @endcan
                                    </td>
                                    <td>
                                     @can('Depense-download')
                                        <a class="btn btn-info" href="{{route('Depense.download',$item->id)}}" role="button"><i class="bi bi-file-earmark-arrow-down"></i>Télécharger</a>
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
