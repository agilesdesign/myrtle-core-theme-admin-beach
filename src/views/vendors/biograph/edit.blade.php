@extends('admin::index')

@section('page-title')
    Biograph
@endsection

@section('page-description')
    {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <span class="breadcrumb-item">Biograph</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-vendor-biograph'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($vendor->biograph, ['route' => ['admin.vendors.biograph.update', $vendor->id], 'method' => 'PATCH', 'id' => 'edit-vendor-biograph']) !!}

    <div class="form-group{{ $errors->has('business_type_id') ? ' has-danger' : '' }}">
        {!! Form::label('business_type_id', 'Business Type') !!}
        {!! Form::select('business_type_id', $businesstypes, null, ['class' => 'form-control', 'placeholder' => 'Select business type..']) !!}

        {!! $errors->first('business_type_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('established_at') ? ' has-danger' : '' }}">
        {!! Form::label('established_at', 'Established') !!}
        {!! Form::date('established_at', $vendor->biograph->established_at, ['class' => 'form-control']) !!}

        {!! $errors->first('established_at', '<div class="form-control-feedback">:message</div>') !!}
    </div>


    {!! Form::close() !!}
@endsection