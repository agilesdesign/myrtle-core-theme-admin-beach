@extends('admin::index')

@section('page-title')
    Edit Marital Status
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-maritalstatus'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.maritalstatuses.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-maritalstatus'] ) }}

@endsection

@section('dock')
    {!! Form::model($maritalstatus, ['route' => ['admin.maritalstatuses.update', $maritalstatus->id], 'method' => 'PUT', 'id' => 'edit-maritalstatus']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::model($maritalstatus, ['route' => ['admin.maritalstatuses.destroy', $maritalstatus->id], 'method' => 'DELETE', 'id' => 'delete-maritalstatus']) !!}
    {!! Form::close() !!}
@endsection
