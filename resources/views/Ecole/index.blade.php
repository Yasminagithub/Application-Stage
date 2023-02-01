@extends('dashboard')

@section('title')
    Page Index Ecole
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
                        <h4>Information Sur l'Etablissement
                        @can('Ecole-create')
                            <a href="{{route('Ecole.create')}}" class="btn btn-primary float-end">Ajouter Information d'etablissement</a>
                        @endcan
                        </h4>

                        <br>
                        <br>
                        <table class="table" id="myTable">
                            <thead class="table-success">
                            <tr>
                                <th>Nom</th>
                                <th>Académie </th>
                                <th>Commune</th>
                                <th>Direction provinciable</th>
                                <th>Photo</th>
                                <th>Opération</th>
                            </tr>
                            </thead>
                            <tbody id="yaya">
                            @foreach($ecoles as $ecole)
                                <tr>
                                    <td>{{$ecole->Nom_Ecole}}</td>
                                    <td>{{$ecole->Academie}}</td>
                                    <td>{{$ecole->Commune}}</td>
                                    <td>{{$ecole->Direction_provinciable}}</td>
                                    <td>
                                    <img src="{{ asset($ecole->Photo) }}" width= '60' height='60' class="img img-responsive" />
                                    </td>
                                    <td>
                                    @can('Ecole-list')
                                        <a class="btn btn-warning" href="{{route('Ecole.show',$ecole->id)}}" role="button"><i class="bi bi-eye-fill"></i>Voir</a>
                                    @endcan 
                                    @can('Ecole-edit')   
                                        <a class="btn btn-primary" href="{{route('Ecole.edit',$ecole->id)}}" role="button">Modifier</a>
                                    @endcan
                                    @can('Ecole-delete')
                                        <form  action="{{route('Ecole.destroy',$ecole->id)}}" method="POST">
                                            @csrf
                                            {{method_field('delete')}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="bi bi-trash text-light"></i>Supprimer</button>
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
