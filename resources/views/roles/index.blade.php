@extends('dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion des rôles</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a href="{{ route('roles.create') }}" class="btn btn-secondary float-end"><i class="bi bi-plus-square-fill"></i>Créer un nouvel rôle</a>  
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Nom</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            @can('role-list')
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Voir</a>
            @endcan
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Modifier</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>

{!! $roles->render() !!}

@endsection
 