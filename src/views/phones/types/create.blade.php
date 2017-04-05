@extends('admin::index')

@section('page-title')
    New Phone Type
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-phonetype'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.phones.types.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($phonetype, ['route' => 'admin.phones.types.store', 'id' => 'create-phonetype']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection