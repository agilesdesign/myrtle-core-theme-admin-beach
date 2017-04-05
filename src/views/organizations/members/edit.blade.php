@extends('admin::index')

@section('page-title')
    Edit Member -
    <small>{{ $user->name->firstLast }} </small>
@endsection

@section('toolbar-list')
    <li class="nav-item">
            {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-sm btn-success', 'type' => 'submit', 'form' => 'edit-member'] ) }}
    </li>
    <li class="nav-item">
        <a class="btn btn-sm btn-danger" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    </li>
@endsection

@section('content')
    {!! Form::model($member, ['route' => ['admin.organizations.members.update', $organization->id, $member->id], 'method' => 'PUT', 'id' => 'edit-member']) !!}

    <div class="form-group">
        {{ Form::label('name[first]', 'First name', ['class' => 'control-label']) }}
        {{ Form::text('name[first]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('name[middle]', 'Middle name', ['class' => 'control-label']) }}
        {{ Form::text('name[middle]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('name[middle]', 'Last name', ['class' => 'control-label']) }}
        {{ Form::text('name[last]', null, ['class' => 'form-control']) }}
    </div>
@endsection