@extends('admin::index')

@section('page-title')
    Create Phone
    <small class="pull-right">
        {{ $vendor->name->legal }} / {{ $location->name }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'create-phone'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.locations.show', [$vendor->id, $location->id]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {!! Form::model($phone, ['route' => ['admin.vendors.locations.phones.store', $vendor->id, $location->id], 'id' => 'create-phone']) !!}

    @include('admin::phones.phone._fields')

    {!! Form::close() !!}
@endsection