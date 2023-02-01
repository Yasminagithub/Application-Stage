@extends('dashboard')


@section('content')

        <div class="text-center">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour </a>
        </div>
    
<div class="card text-center">
        <div class="card-header d-flex justify-content-center"><h4 style="color:darkgreen"> Fiche Utilisateur </h4></div>

    
        <div class="card-title">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="card-title">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="card-title">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    
</div>
@endsection