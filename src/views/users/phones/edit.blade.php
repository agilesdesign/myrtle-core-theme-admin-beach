@extends('admin::index')

@section('page-title')
    Edit Phone -
    <small>{{ $user->name->firstLast }} </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-user-phone'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::model($phone, ['route' => ['admin.users.phones.update', $user->id, $phone->id], 'method' => 'PUT', 'id' => 'edit-user-phone']) !!}

    @include('admin::phones.phone._fields')

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