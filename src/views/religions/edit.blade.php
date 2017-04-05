@extends('admin::index')

@section('page-title')
    Edit Religion
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-religion'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.religions.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-religion'] ) }}
@endsection


@section('dock')
    {!! Form::model($religion, ['route' => ['admin.religions.update', $religion->id], 'method' => 'PUT', 'id' => 'edit-religion']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::model($religion, ['route' => ['admin.religions.destroy', $religion->id], 'method' => 'DELETE', 'id' => 'delete-religion']) !!}
    {!! Form::close() !!}
@endsection
