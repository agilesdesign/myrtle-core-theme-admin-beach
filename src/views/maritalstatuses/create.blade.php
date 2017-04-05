@extends('admin::index')

@section('page-title')
    New Marital Status
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-maritalstatus'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.maritalstatuses.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::open(['route' => 'admin.maritalstatuses.store', 'id' => 'create-maritalstatus']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection