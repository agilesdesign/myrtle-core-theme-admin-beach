@extends('layouts.app')

@section('page-title')
    New Phone -
    <small>{{ $vendor->name }} </small>
@endsection

@section('content')
    {!! Form::model($phone, ['url' => ['/vendors/' . $vendor->id . '/phones/' . $phone->id]]) !!}

    <div class="form-group">
        {!! Form::text('vendor_id', $vendor->id, ['readonly' => 'readonly', 'class' => 'form-control hidden-xs-up', 'placeholder' => 'Choose a vendor..']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('vendor_name', 'Vendor') !!}
        {!! Form::text('vendor_name', $vendor->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type_id', 'Type') !!}
        {!! Form::select('type_id', $phoneTypes, null, ['class' => 'form-control select2', 'placeholder' => 'Select phone type..']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone', 'Phone') !!}
        {!! Form::text('phone', null, ['class' => 'editor form-control']) !!}
    </div>

    <div class="btn-group pull-right">
        {!! Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-sm btn-success', 'type' => 'submit']) !!}
        <a class="btn btn-sm btn-danger" href="{{ route('vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
        {!! Form::close() !!}
    </div>
@endsection