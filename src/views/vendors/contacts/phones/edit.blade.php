@extends('admin::index')

@section('page-title')
    Phone
@endsection

@section('page-description')
    {{ $contact->name->firstLast }} @ {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <a href="{{ route('admin.vendors.contacts.index', $vendor) }}" class="breadcrumb-item">Contacts</a>
    <a href="{{ route('admin.vendors.contacts.show', [$vendor, $contact]) }}" class="breadcrumb-item">{{ $contact->name->firstLast }}</a>
    <span class="breadcrumb-item">Phones</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-phone'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.contacts.show', [$vendor, $contact]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection


@section('dock')
    {!! Form::model($phone, ['route' => ['admin.vendors.contacts.phones.update', $vendor, $contact, $phone], 'method' => 'PATCH', 'id' => 'edit-phone']) !!}

    @include('admin::phones.phone._fields')

    {!! Form::close() !!}
@endsection