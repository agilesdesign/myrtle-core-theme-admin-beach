@extends('admin::index')

@section('page-title')
    Edit Email -
    <small>{{ $user->name->firstLast }} </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-user-email'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-gender'] ) }}

@endsection

@section('dock')
    {!! Form::model($email, ['route' => ['admin.users.emails.update', $user->id, $email->id], 'method' => 'PUT', 'id' => 'edit-user-email']) !!}

    <div class="form-group">
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::model($email, ['route' => ['admin.users.emails.destroy', $user->id, $email->id], 'method' => 'DELETE', 'id' => 'delete-gender']) !!}
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