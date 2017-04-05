@extends('admin::index')

@section('page-title')
    New Credential
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'create-credential'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.credentials.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::model($credential, ['route' => 'admin.credentials.store', 'id' => 'create-credential']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('username', 'Username', ['class' => 'control-label']) }}
        {{ Form::text('username', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
        {{ Form::text('password', null, ['class' => 'form-control', 'type' => 'password']) }}
    </div>

    <div class="form-group">
        {{ Form::label('location', 'Location', ['class' => 'control-label']) }}
        {{ Form::text('location', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::close() }}
@endsection