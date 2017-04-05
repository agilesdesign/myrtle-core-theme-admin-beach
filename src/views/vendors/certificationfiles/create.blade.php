@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Add Certification</div>
        <div class="panel-body">
            {!! Form::model($certificationFile, ['route' => ['vendors.certificationfiles.store', $vendor->id], 'files' => 'true']) !!}

            <div class="form-group">
                {!! Form::text('vendor_id', $vendor->id, ['readonly' => 'readonly', 'class' => 'form-control hidden-xs-up', 'placeholder' => 'Choose a vendor..']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('vendor_name', 'Vendor') !!}
                {!! Form::text('vendor_name', $vendor->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('type_id', 'Certification Type') !!}
                {!! Form::select('type_id', $certificationTypes, null, ['class' => 'form-control select2', 'placeholder' => 'Choose a certification type..']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('start_at', 'Starts') !!}
                {!! Form::datetime('start_at', null, ['class' => 'form-control datetimepicker']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('expire_at', 'Expires') !!}
                {!! Form::datetime('expire_at', null, ['class' => 'form-control datetimepicker']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('certification_file', 'Certification File') !!}
                {!! Form::file('certification_file', null, ['class' => 'form-control', 'placeholder' => 'example@email.com']) !!}
            </div>

            <div class="btn-group pull-right">
                {!! Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-sm btn-success', 'type' => 'submit']) !!}
                <a class="btn btn-sm btn-danger" href="{{ route('vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection