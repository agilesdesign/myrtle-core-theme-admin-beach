@extends('admin::index')

@section('page-title')
    Demographic
@endsection

@section('page-description')
    {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <span class="breadcrumb-item">Demographic</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-vendor-demographic'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($vendor->demographic, ['route' => ['admin.vendors.demographic.update', $vendor->id], 'method' => 'PATCH', 'id' => 'edit-vendor-demographic']) !!}

    <h3>Customers</h3>
    <div class="form-group{{ $errors->has('customers_region') ? ' has-danger' : '' }}">
        {!! Form::label('customers_region', 'Regional') !!}
        {!! Form::text('customers_region', null, ['class' => 'form-control']) !!}

        {!! $errors->first('customers_region', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('customers_domestic') ? ' has-danger' : '' }}">
        {!! Form::label('customers_domestic', 'Domestic') !!}
        {!! Form::text('customers_domestic', null, ['class' => 'form-control']) !!}

        {!! $errors->first('customers_domestic', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('customers_foreign') ? ' has-danger' : '' }}">
        {!! Form::label('customers_foreign', 'Foreign') !!}
        {!! Form::text('customers_foreign', null, ['class' => 'form-control']) !!}

        {!! $errors->first('customers_foreign', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <h3>Employees</h3>
    <div class="form-group{{ $errors->has('fulltime_employees') ? ' has-danger' : '' }}">
        {!! Form::label('fulltime_employees', 'Full-time') !!}
        {!! Form::text('fulltime_employees', null, ['class' => 'form-control']) !!}

        {!! $errors->first('fulltime_employees', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {!! Form::close() !!}
@endsection