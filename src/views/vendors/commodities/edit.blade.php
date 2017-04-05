@extends('admin::index')

@section('page-title')
    Commodities
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->legal_name }}</a>
    <span class="breadcrumb-item">Commodities</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('page-description')
    {{ $vendor->legal_name }}
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-vendor-commodities'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($vendor, ['route' => ['admin.vendors.commodities.update', $vendor->id], 'method' => 'PATCH', 'id' => 'edit-vendor-commodities']) !!}

    <div class="form-group">
        {!! Form::label('commodities', 'Commodities') !!}
        {!! Form::select('commodities[]', $commodities, $vendor->commodities->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
    </div>

    {!! Form::close() !!}
@endsection