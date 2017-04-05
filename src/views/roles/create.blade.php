@extends('admin::index')

@section('page-title')
    New Role
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-role'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.roles.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($role, ['route' => 'admin.roles.store', 'id' => 'create-role']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection