@extends('admin::index')

@section('page-title')
    Edit Organization
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-organization'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.organizations.show', $organization->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')

    {{ Form::model($organization, ['route' => ['admin.organizations.update', $organization->id], 'method' => 'patch', 'id' => 'edit-organization']) }}

    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', $organization->name, ['class' => 'form-control']) }}

        {!! $errors->first('name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}

@endsection