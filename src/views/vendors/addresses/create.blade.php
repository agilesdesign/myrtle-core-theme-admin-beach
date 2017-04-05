@extends('admin::index')

@section('page-title')
    New Address -
    <small>{{ $vendor->legal_name }} </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-vendor-address'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($address, ['route' => ['admin.vendors.addresses.store', $vendor->id], 'id' => 'create-vendor-address']) !!}

    @include('admin::addresses.address._fields')

    {!! Form::close() !!}
@endsection