@extends('admin::index')

@section('page-title')
    Password
@endsection

@section('page-description')
    {{ $user->name->firstLast }}
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-user'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a></li>
@endsection

@section('dock')
    {!! Form::model($user, ['route' => ['admin.users.password.update', $user->id], 'method' => 'PUT', 'id' => 'edit-user']) !!}

    <div class="form-group">
        {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
        {{ Form::password('password', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) }}
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    </div>

    {!! Form::close() !!}
@endsection