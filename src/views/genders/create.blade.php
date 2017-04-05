@extends('admin::index')

@section('page-title')
    New Gender
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-gender'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.genders.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($gender, ['route' => 'admin.genders.store', 'id' => 'create-gender']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection