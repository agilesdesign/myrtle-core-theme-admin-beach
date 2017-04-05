@extends('admin::index')

@section('page-title')
    Session
@endsection

@section('page-description')
    Configuration
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-configuration-app'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.configurations.session.edit') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item">Configuration</span>
    <span class="breadcrumb-item active">Session</span>
@endsection

@section('dock')
    {{ Form::open(['route' => ['admin.configurations.session.update', $group], 'method' => 'patch', 'id' => 'edit-configuration-app']) }}

    <div class="form-group{{ $errors->has('driver') ? ' has-danger' : '' }}">
        <label for="driver">Driver</label>

        <select name="driver" id="driver" class="form-control select2">
            <option value="" hidden selected disabled>Select session driver</option>
            @foreach(config('session.drivers') as $driver)
                <option value="{{ $driver }}"{{ $driver == config('session.driver') ? ' selected' : '' }}>{{ $driver }}</option>
            @endforeach
        </select>

        {!! $errors->first('driver', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('connection') ? ' has-danger' : '' }}">
        {{ Form::label('connection', 'Connection', ['class' => 'control-label']) }}
        {{ Form::select('connection', ['mysql' => 'mysql'], $configuration['connection'], ['class' => 'select2 form-control']) }}

        {!! $errors->first('connection', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('lifetime') ? ' has-danger' : '' }}">
        {{ Form::label('lifetime', 'Lifetime (min)', ['class' => 'control-label']) }}
        {{ Form::select('lifetime', $lifetime, $configuration['lifetime'], ['class' => 'select2 form-control']) }}

        {!! $errors->first('lifetime', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('expire_on_close') ? ' has-danger' : '' }}">
        {{ Form::label('expire_on_close', 'Expires on browser close', ['class' => 'control-label']) }}
        {{ Form::select('expire_on_close', [0 => 'No', 1 => 'Yes'], $configuration['expire_on_close'], ['class' => 'select2 form-control']) }}

        {!! $errors->first('expire_on_close', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('encrypt') ? ' has-danger' : '' }}">
        {{ Form::label('encrypt', 'Encrypt', ['class' => 'control-label']) }}
        {{ Form::select('encrypt', [0 => 'No', 1 => 'Yes'], $configuration['encrypt'], ['class' => 'select2 form-control']) }}

        {!! $errors->first('encrypt', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('cookie') ? ' has-danger' : '' }}">
        {{ Form::label('cookie', 'Cookie', ['class' => 'control-label']) }}
        {{ Form::text('cookie', $configuration['cookie'], ['class' => 'form-control']) }}

        {!! $errors->first('cookie', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}
@endsection