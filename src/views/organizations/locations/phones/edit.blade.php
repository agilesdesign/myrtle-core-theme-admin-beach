@extends('admin::index')

@section('page-title')
    Edit Phone
    <small class="pull-right">
        {{ $organization->name }} / {{ $location->name }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'update-phone'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.organizations.locations.show', [$organization->id, $location->id]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {!! Form::model($phone, ['route' => ['admin.organizations.locations.phones.update', $organization->id, $location->id, $phone->id], 'method' => 'PUT', 'id' => 'update-phone']) !!}

    <div class="form-group{{ $errors->has('organization_id') ? ' has-danger' : '' }}">
        {!! Form::text('organization_id', $organization->id, ['readonly' => 'readonly', 'class' => 'form-control hidden-xs-up', 'placeholder' => 'Choose a organization..']) !!}

        {!! $errors->first('organization_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('organization_name') ? ' has-danger' : '' }}">
        {!! Form::label('organization_name', 'Organization') !!}
        {!! Form::text('organization_name', $organization->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

        {!! $errors->first('organization_name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('location_id') ? ' has-danger' : '' }}">
        {!! Form::text('location_id', $location->id, ['readonly' => 'readonly', 'class' => 'form-control hidden-xs-up', 'placeholder' => 'Choose a organization..']) !!}

        {!! $errors->first('location_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('location_name') ? ' has-danger' : '' }}">
        {!! Form::label('location_name', 'Location') !!}
        {!! Form::text('location_name', $location->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

        {!! $errors->first('location_name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('type_id') ? ' has-danger' : '' }}">
        {!! Form::label('type_id', 'Type') !!}
        {!! Form::select('type_id', $phonetypes, null, ['class' => 'form-control select2', 'placeholder' => 'Select phone type..']) !!}

        {!! $errors->first('type_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
        {!! Form::label('number', 'Number') !!}
        {!! Form::text('number', null, ['class' => 'editor form-control']) !!}

        {!! $errors->first('number', '<div class="form-control-feedback">:message</div>') !!}
    </div>
@endsection