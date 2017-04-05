@extends('admin::index')

@section('page-title')
    New Address -
    <small>{{ $user->name->firstLast }} </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-user-address'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($address, ['route' => ['admin.users.addresses.store', $user->id], 'id' => 'create-user-address']) !!}

    @include('admin::addresses.address._fields')

    {!! Form::close() !!}
@endsection