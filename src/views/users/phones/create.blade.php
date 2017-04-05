@extends('admin::index')

@section('page-title')
    New Phone -
    <small>{{ $user->name->firstLast }} </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-user-phone'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($phone, ['route' => ['admin.users.phones.store', $user->id], 'id' => 'create-user-phone']) !!}

    @include('admin::phones.phone._fields')

    {!! Form::close() !!}
@endsection