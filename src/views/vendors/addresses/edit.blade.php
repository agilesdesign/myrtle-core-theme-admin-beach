@extends('layouts.app')

@section('page-title')
    Edit Address -
    <small>{{ $vendor->name }} </small>
@endsection

@section('content')
    {!! Form::model($address, ['url' => ['/vendors/' . $vendor->id . '/addresses/' . $address->id], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::text('vendor_id', $vendor->id, ['readonly' => 'readonly', 'class' => 'form-control hidden-xs-up', 'placeholder' => 'Choose a vendor..']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('vendor_name', 'Vendor') !!}
        {!! Form::text('vendor_name', $vendor->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type_id', 'Type') !!}
        {!! Form::select('type_id', $addressTypes, null, ['class' => 'form-control select2', 'placeholder' => 'Select address type..']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('street', 'Street') !!}
        {!! Form::text('street', null, ['class' => 'editor form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('country', 'Country') !!}
        {!! Form::select('country', $countries, null, ['class' => 'form-control select2', 'placeholder' => 'Select country..']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('zip', 'Zip') !!}
        {!! Form::text('zip', null, ['class' => 'editor form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City') !!}
        {!! Form::text('city', null, ['class' => 'editor form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('state', 'State') !!}
        {!! Form::text('state', null, ['class' => 'editor form-control']) !!}
    </div>

    <div class="btn-group pull-right">
        {!! Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-sm btn-success', 'type' => 'submit']) !!}
        <a class="btn btn-sm btn-danger" href="{{ route('vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#country').change(function(){
                fetchCityState();
            });

            $('#zip').off('keyup drop').on('keyup drop', function(){
                fetchCityState();
            });
        });

        function fetchCityState()
        {
            country = $('#country').val();
            zip = $('#zip').val();

            if(country && zip)
            {
                $.ajax({
                    url: "http://api.zippopotam.us/" + country + "/" + zip,
                    success: function(data) {
                        $('#city').val(data['places'][0]['place name']);
                        $('#state').val(data['places'][0]['state']);
                    },
                    error: function(data) {
                        $('#city').val('');
                        $('#state').val('');
                    }
                });
            }
        }
    </script>
@endsection