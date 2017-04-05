@extends('admin::index')

@section('page-title')
    Registration
@endsection

@section('content')
    {!! Form::model($user, ['route' => ['users.register' ], 'method' => 'PUT']) !!}

    <div class="form-group">
        {{ Form::label('name[first]', 'First name', ['class' => 'control-label']) }}
        {{ Form::text('name[first]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('name[middle]', 'Middle name', ['class' => 'control-label']) }}
        {{ Form::text('name[middle]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('name[middle]', 'Last name', ['class' => 'control-label']) }}
        {{ Form::text('name[last]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('emails[0][address]', 'Email', ['class' => 'control-label']) }}
        {{ Form::text('emails[0][address]', null, ['class' => 'form-control']) }}
    </div>

    <div class="btn-group pull-right">
        {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-sm btn-success', 'type' => 'submit'] ) }}
        <a class="btn btn-sm btn-danger" href="{{ url('/') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    </div>
@endsection