@extends('admin::index')

@section('page-title')
    Edit Role
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.roles.index') }}" class="breadcrumb-item">Roles</a>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-genders'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.roles.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-role'] ) }}
@endsection

@section('dock')
    {!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method' => 'PUT', 'id' => 'edit-genders']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    @if($role->isUserAssignable)
    <div class="form-group">
        {!! Form::label('users', 'Members') !!}
        {!! Form::select('users[]', $users, $members, ['class' => 'form-control select2', 'placeholder' => 'Select users..', 'multiple' => 'multiple']) !!}
    </div>
    @endif
    {!! Form::close() !!}

    {!! Form::model($role, ['route' => ['admin.roles.destroy', $role->id], 'method' => 'DELETE', 'id' => 'delete-role']) !!}
    {!! Form::close() !!}
@endsection
