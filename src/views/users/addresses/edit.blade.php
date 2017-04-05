@extends('admin::index')

@section('page-title')
    Edit Address -
    <small>{{ $user->name->firstLast }} </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-user-address'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($address, ['route' => ['admin.users.addresses.update', $user->id, $address->id], 'method' => 'PUT', 'id' => 'edit-user-address']) !!}

    @include('admin::addresses.address._fields')

    {!! Form::close() !!}
@endsection