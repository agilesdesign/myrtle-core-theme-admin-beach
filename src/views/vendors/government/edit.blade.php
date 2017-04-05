@extends('admin::index')

@section('page-title')
    Government
@endsection

@section('page-description')
    {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <span class="breadcrumb-item">Government</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-vendor-government'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($vendor->government, ['route' => ['admin.vendors.government.update', $vendor->id], 'method' => 'PATCH', 'id' => 'edit-vendor-government']) !!}

    <div class="form-group{{ $errors->has('ein') ? ' has-danger' : '' }}">
        {{ Form::label('ein', 'EIN', ['class' => 'control-label']) }}
        {{ Form::text('ein', null, ['class' => 'form-control']) }}

        {!! $errors->first('ein', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('tin') ? ' has-danger' : '' }}">
        {{ Form::label('tin', 'TIN', ['class' => 'control-label']) }}
        {{ Form::text('tin', null, ['class' => 'form-control']) }}

        {!! $errors->first('tin', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('duns') ? ' has-danger' : '' }}">
        {{ Form::label('duns', 'DUNS', ['class' => 'control-label']) }}
        {{ Form::text('duns', null, ['class' => 'form-control']) }}

        {!! $errors->first('duns', '<div class="form-control-feedback">:message</div>') !!}
    </div>


    {!! Form::close() !!}
@endsection