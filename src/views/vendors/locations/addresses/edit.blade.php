@extends('admin::index')

@section('page-title')
    Edit Address
    <small class="pull-right">
        {{ $vendor->name->legal }} / {{ $location->name }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-address'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.locations.show', [$vendor->id, $location->id]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {!! Form::model($address, ['route' => ['admin.vendors.locations.addresses.update', $vendor->id, $location->id, $address->id], 'method' => 'PUT', 'id' => 'edit-address']) !!}

    @include('admin::addresses.address._fields')

    {!! Form::close() !!}
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