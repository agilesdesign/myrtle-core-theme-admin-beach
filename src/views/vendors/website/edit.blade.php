@extends('admin::index')

@section('page-title')
    Website
@endsection

@section('page-description')
    {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <span class="breadcrumb-item">Website</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-vendor-website'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($vendor->website, ['route' => ['admin.vendors.website.update', $vendor->id], 'method' => 'PATCH', 'id' => 'edit-vendor-website']) !!}

    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}

        {!! $errors->first('address', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {!! Form::close() !!}
@endsection