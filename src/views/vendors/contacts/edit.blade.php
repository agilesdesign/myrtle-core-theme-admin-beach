@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Contact</div>
        <div class="panel-body">
            {!! Form::model($contact, ['url' => '/vendors/' . $vendor->id . '/contacts/' . $contact->id, 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::text('vendor_id', $vendor->id, ['readonly' => 'readonly', 'class' => 'form-control hidden-xs-up', 'placeholder' => 'Choose a vendor..']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('vendor_name', 'Vendor') !!}
                {!! Form::text('vendor_name', $vendor->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@email.com']) !!}
            </div>

            <div class="btn-group pull-right">
                {!! Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-sm btn-success', 'type' => 'submit']) !!}
                <a class="btn btn-sm btn-danger" href="{{ url('/vendors/' . $vendor->id . '/contacts/' . $contact->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection