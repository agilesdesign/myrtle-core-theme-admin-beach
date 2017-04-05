@extends('admin::index')

@section('page-title')
    Edit Ethnicity
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-ethnicity'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.ethnicities.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-ethnicity'] ) }}
@endsection

@section('dock')
    {!! Form::model($ethnicity, ['route' => ['admin.ethnicities.update', $ethnicity->id], 'method' => 'PUT', 'id' => 'edit-ethnicity']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::model($ethnicity, ['route' => ['admin.ethnicities.destroy', $ethnicity->id], 'method' => 'DELETE', 'id' => 'delete-ethnicity']) !!}
    {!! Form::close() !!}

@endsection