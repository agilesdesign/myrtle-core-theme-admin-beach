@extends('admin::index')

@section('page-title')
    Edit Organizations
@endsection

@section('content')
    {{ Form::model($user, ['route' => ['users.organizations.update', $user->id], 'method' => 'patch']) }}

    <div class="form-group">
    @if($user->organizations->isEmpty())
        {!! Form::label('organizations[0]', 'Type') !!}
        {!! Form::select('organizations[0]', $organizations, null, ['class' => 'form-control select2', 'placeholder' => 'Select organization..']) !!}
    @else
        @foreach($user->organizations as $key => $organization)
            {!! Form::label('organizations[' . $key . ']', 'Type') !!}
            {!! Form::select('organizations[' . $key . ']', $organizations, $organization->id, ['class' => 'form-control select2', 'placeholder' => 'Select organization..']) !!}
        @endforeach
    @endif
    </div>


    <div class="btn-group pull-right">
        {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-sm btn-success', 'type' => 'submit'] ) }}
        <a class="btn btn-sm btn-danger" href="{{ route('settings.app.edit') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    </div>

    {{ Form::close() }}
@endsection