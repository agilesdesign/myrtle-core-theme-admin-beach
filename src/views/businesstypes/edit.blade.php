@extends('admin::index')

@section('page-title')
    Edit Business Type
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-businesstype'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.businesstypes.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {!! Form::model($businesstype, ['route' => ['admin.businesstypes.update', $businesstype->id], 'method' => 'PUT', 'id' => 'edit-businesstype']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
@endsection