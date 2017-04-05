@extends('admin::index')

@section('page-title')
    Edit Gender
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-genders'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.genders.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-gender'] ) }}
@endsection

@section('dock')
    {!! Form::model($gender, ['route' => ['admin.genders.update', $gender->id], 'method' => 'PUT', 'id' => 'edit-genders']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::model($gender, ['route' => ['admin.genders.destroy', $gender->id], 'method' => 'DELETE', 'id' => 'delete-gender']) !!}
    {!! Form::close() !!}
@endsection