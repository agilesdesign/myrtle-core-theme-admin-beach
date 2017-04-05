@extends('admin::index')

@section('page-title')
    Roles
@endsection

@section('page-description')
    {{ $user->name->firstLast }}
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-roles'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($user, ['route' => ['admin.users.roles.update', $user->id], 'method' => 'PUT', 'id' => 'edit-roles']) !!}

    <div class="form-group">
        {!! Form::label('roles', 'Roles') !!}
        {!! Form::select('roles[]', $roles, $membership, ['class' => 'form-control select2', 'placeholder' => 'Select roles..', 'multiple' => 'multiple']) !!}
    </div>
    {!! Form::close() !!}
@endsection