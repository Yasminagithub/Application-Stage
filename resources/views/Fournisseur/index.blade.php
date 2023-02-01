@extends('dashboard')

@section('title')
    Page Index Fournisseur
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
                        <h4>Liste des fournisseurs
                        @can('Fournisseur-create')
                            <a href="{{route('Fournisseur.create')}}" class="btn btn-primary float-end"><i class="bi bi-person-plus-fill"></i>Ajouter Fournisseur</a>
                        @endcan
                        </h4>

                        <br>
                        <br>
                        <table class="table" id="myTable">
                            <thead class="table-success">
                            <tr>
                                <th>Nom</th>
                                <th>Télephone</th>
                                {{-- <th>Email</th> --}}
                                <th>Description</th>
                                <th>Opérations</th>
                            </tr>
                            </thead>
                            <tbody id="yaya">
                                @foreach($fournisseurs as $fournisseur)
                                <tr>
                                    <td>{{$fournisseur->Nom}}</td>
                                    <td>{{$fournisseur->Telephone}}</td>
                                    {{-- <td>{{$fournisseur->Email}}</td> --}}
                                    <td>{{$fournisseur->Description}}</td>
                                    <td>
                                    @can('Fournisseur-list')
                                        <a class="btn btn-warning" href="{{route('Fournisseur.show',$fournisseur->id)}}" role="button"><i class="bi bi-eye-fill"></i>Voir</a>
                                    @endcan
                                    @can('Fournisseur-edit')    
                                        <a class="btn btn-primary" href="{{route('Fournisseur.edit',$fournisseur->id)}}" role="button">Modifier</a>
                                    @endcan 
                                    @can('Fournisseur-delete')   
                                        <form  action="{{route('Fournisseur.destroy',$fournisseur->id)}}" method="POST">
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
