@extends('admin::index')

@section('page-title')
    Edit Address Type
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-addresstype'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.addresses.types.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-addresstype'] ) }}
@endsection

@section('dock')
    {!! Form::model($type, ['route' => ['admin.addresses.types.update', $type->id], 'method' => 'PUT', 'id' => 'edit-addresstype']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::model($type, ['route' => ['admin.addresses.types.destroy', $type->id], 'method' => 'DELETE', 'id' => 'delete-addresstype', 'data-confirm' => 'delete-one']) !!}
    {!! Form::close() !!}
@endsection