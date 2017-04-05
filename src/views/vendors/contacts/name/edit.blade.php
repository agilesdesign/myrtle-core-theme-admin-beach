@extends('admin::index')

@section('page-title')
    Name
@endsection

@section('page-description')
    {{ $contact->name->firstLast }} @ {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <a href="{{ route('admin.vendors.contacts.index', $vendor) }}" class="breadcrumb-item">Contacts</a>
    <a href="{{ route('admin.vendors.contacts.show', [$vendor, $contact]) }}" class="breadcrumb-item">{{ $contact->name->firstLast }}</a>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-name'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.contacts.show', [$vendor, $contact]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {{ Form::model($contact->name, ['route' => ['admin.vendors.contacts.name.update', $vendor, $contact], 'method' => 'PATCH', 'id' => 'edit-name']) }}

    @include('admin::person.names.legal._fields')

    @include('admin::person.names.additional._fields')

    {{ Form::close() }}
@endsection