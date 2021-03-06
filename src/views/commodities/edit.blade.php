@extends('admin::index')

@section('page-title')
    Edit Commodity
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-commodity'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.commodities.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($commodity, ['route' => ['admin.commodities.update', $commodity->id], 'method' => 'PUT', 'id' => 'edit-commodity']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection