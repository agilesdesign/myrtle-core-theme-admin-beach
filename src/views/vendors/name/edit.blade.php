@extends('admin::index')

@section('page-title')
    Names
@endsection

@section('page-description')
    {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <span class="breadcrumb-item">Name</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-vendor-biograph'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($vendor->name, ['route' => ['admin.vendors.name.update', $vendor->id], 'method' => 'PATCH', 'id' => 'edit-vendor-biograph']) !!}

    <div class="form-group">
        {!! Form::label('legal', 'legal') !!}
        {!! Form::text('legal', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('previous_legal', 'Previous Legal') !!}
        {!! Form::text('previous_legal', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('alternative', 'Alternative') !!}
        {!! Form::text('alternative', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection