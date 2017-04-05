@extends('admin::index')

@section('page-title')
    Edit Phone Type
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-phonetype'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.phones.types.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-phonetype'] ) }}
@endsection


@section('dock')
    {!! Form::model($phonetype, ['route' => ['admin.phones.types.update', $phonetype->id], 'method' => 'PUT', 'id' => 'edit-phonetype']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', $phonetype->name, ['class' => 'form-control']) !!}
    </div>

    {{ Form::close() }}

    {!! Form::model($phonetype, ['route' => ['admin.phones.types.destroy', $phonetype->id], 'method' => 'DELETE', 'id' => 'delete-phonetype']) !!}
    {!! Form::close() !!}

@endsection