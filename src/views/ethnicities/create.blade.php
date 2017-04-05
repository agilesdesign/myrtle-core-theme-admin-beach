@extends('admin::index')

@section('page-title')
    New Ethnicity
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-ethnicity'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.ethnicities.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($ethnicity, ['route' => 'admin.ethnicities.store', 'id' => 'create-ethnicity']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection