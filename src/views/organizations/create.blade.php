@extends('admin::index')

@section('page-title')
    Create Organization
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'create-organization'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.organizations.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::model($organization, ['route' => 'admin.organizations.store', 'id' => 'create-organization']) }}

    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', $organization->name, ['class' => 'form-control']) }}

        {!! $errors->first('name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}
@endsection