@extends('admin::index')

@section('page-title')
    Email
@endsection

@section('page-description')
    {{ $contact->name->firstLast }} @ {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <a href="{{ route('admin.vendors.contacts.index', $vendor) }}" class="breadcrumb-item">Contacts</a>
    <a href="{{ route('admin.vendors.contacts.show', [$vendor, $contact]) }}" class="breadcrumb-item">{{ $contact->name->firstLast }}</a>
    <span class="breadcrumb-item">Emails</span>
    <span class="breadcrumb-item active">Create</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'create-contact-email'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.contacts.show', [$vendor, $contact]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($email, ['route' => ['admin.vendors.contacts.emails.store', $vendor, $contact], 'id' => 'create-contact-email']) !!}

    <div class="form-group">
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection