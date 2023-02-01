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
                        <h4>Liste des étudiants
                        @can('Etudiant-create')
                            <a href="{{route('etudiant.create')}}" class="btn btn-primary float-end"><i class="bi bi-person-plus-fill"></i>Ajouter étudiant</a>
                        @endcan
                        @can('Frais')
                            <a href="{{route('Frais.index')}}" class="btn btn-secondary float-end">Frais d'étudiant</a>
                        @endcan
                        </h4>

                        <br>
                        <br>

                        <table class="table" id="myTable">
                            <thead class="table-success">
                            <tr>
                                <th>CNE</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Cycle</th>
                                <th>Niveau </th>
                                <th>Groupe</th>
                                <th>Photo</th>
                                <th>Opérations</th>
                            </tr>
                            </thead>
                            <tbody id="yaya">
                                @foreach($etudiants as $etudiant)
                                <tr>
                                    <td>{{$etudiant->CNE}}</td>
                                    <td>{{$etudiant->Nom_Etudiant}}</td>
                                    <td>{{$etudiant->Prenom_Etudiant}}</td>
                                    <td>{{$etudiant->Date_Naissance_Etudiant}}</td>
                                    <td>{{$etudiant->Cycle}}</td>
                                    <td>{{$etudiant->Niveau}}</td>
                                    <td>{{$etudiant->Groupe}}</td>
                                    <td>
                                    <img src="{{ asset($etudiant->photo) }}" width= '60' height='60' class="img img-responsive" />
                                    </td>
                                    <td>
                                    @can('Etudiant-list')
                                        <a class="btn btn-warning" href="{{route('etudiant.show',$etudiant->id)}}" role="button"><i class="bi bi-eye-fill"></i>Voir</a>
                                    @endcan
                                    @can('Etudiant-edit')
                                        <a class="btn btn-primary" href="{{route('etudiant.edit',$etudiant->id)}}" role="button">Modifier</a>
                                    @endcan
                                    @can('Etudiant-delete')
                                        <form  action="{{route('etudiant.destroy',$etudiant->id)}}" method="POST">
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
