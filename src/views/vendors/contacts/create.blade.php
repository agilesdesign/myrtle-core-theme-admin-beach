@extends('admin::index')

@section('page-title')
    Create Contact
@endsection

@section('page-description')
    {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <a href="{{ route('admin.vendors.contacts.index', $vendor) }}" class="breadcrumb-item">Contacts</a>
    <span class="breadcrumb-item active">Create</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'create-contact'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection


@section('dock')
    {!! Form::model($contact->name, ['route' => ['admin.vendors.contacts.store', $vendor->id], 'id' => 'create-contact']) !!}

    @include('admin::person.names.legal._fields')

    {!! Form::close() !!}
@endsection