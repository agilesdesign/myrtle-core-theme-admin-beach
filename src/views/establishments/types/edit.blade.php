@extends('admin::index')

@section('page-title')
    Edit Establishment Type
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-businesstype'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.establishments.types.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($establishmenttype, ['route' => ['admin.establishments.types.update', $establishmenttype->id], 'method' => 'PUT', 'id' => 'edit-businesstype']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection