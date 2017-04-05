@extends('admin::index')

@section('page-title')
    Edit Address
    <small class="pull-right">
        {{ $organization->name }} / {{ $location->name }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-address'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.organizations.locations.show', [$organization->id, $location->id]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {!! Form::model($address, ['route' => ['admin.organizations.locations.addresses.update', $organization->id, $location->id, $address->id], 'method' => 'PUT', 'id' => 'edit-address']) !!}

    <div class="form-group{{ $errors->has('organization_id') ? ' has-danger' : '' }}">
        {!! Form::text('organization_id', $organization->id, ['readonly' => 'readonly', 'class' => 'form-control hidden-xs-up', 'placeholder' => 'Choose a organization..']) !!}

        {!! $errors->first('organization_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('organization_name') ? ' has-danger' : '' }}">
        {!! Form::label('organization_name', 'Organization') !!}
        {!! Form::text('organization_name', $organization->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

        {!! $errors->first('organization_name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('location_id') ? ' has-danger' : '' }}">
        {!! Form::text('location_id', $location->id, ['readonly' => 'readonly', 'class' => 'form-control hidden-xs-up', 'placeholder' => 'Choose a organization..']) !!}

        {!! $errors->first('location_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('location_name') ? ' has-danger' : '' }}">
        {!! Form::label('location_name', 'Location') !!}
        {!! Form::text('location_name', $location->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

        {!! $errors->first('location_name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('type_id') ? ' has-danger' : '' }}">
        {!! Form::label('type_id', 'Type') !!}
        {!! Form::select('type_id', $addresstypes, null, ['class' => 'form-control select2', 'placeholder' => 'Select address type..']) !!}

        {!! $errors->first('type_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
        {!! Form::label('street', 'Street') !!}
        {!! Form::text('street', null, ['class' => 'editor form-control']) !!}

        {!! $errors->first('street', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
        {!! Form::label('country', 'Country') !!}
        {!! Form::select('country', $countries, null, ['class' => 'form-control select2', 'placeholder' => 'Select country..']) !!}

        {!! $errors->first('country', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('zip') ? ' has-danger' : '' }}">
        {!! Form::label('zip', 'Zip') !!}
        {!! Form::text('zip', null, ['class' => 'editor form-control']) !!}

        {!! $errors->first('zip', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
        {!! Form::label('city', 'City') !!}
        {!! Form::text('city', null, ['class' => 'editor form-control']) !!}

        {!! $errors->first('city', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
        {!! Form::label('state', 'State') !!}
        {!! Form::text('state', null, ['class' => 'editor form-control']) !!}

        {!! $errors->first('state', '<div class="form-control-feedback">:message</div>') !!}
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