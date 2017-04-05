@extends('admin::index')

@section('page-title')
    Permissions
@endsection

@section('page-description')
    {{ $user->name->firstLast }}
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-permissions'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {{ Form::open(['route' => ['admin.users.permissions.update', $user->id], 'method' => 'PUT', 'id' => 'edit-permissions']) }}

    <div class="row">
        <div class="col-xs-3">
            <ul class="nav nav-pills nav-stacked">
                @foreach($user->abilities as $ability)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ str_replace('\\', '-', str_replace('.', '-', $ability->name)) }}-pane" role="tab">
                            {{ Config::get('abilities.' . str_replace($user->id . '.', '', $ability->name)) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-xs-9">
            <div class="tab-content">
                @foreach($user->abilities as $ability)
                    <div class="tab-pane {{ $loop->first ? 'active' : ''}}" id="{{ str_replace('\\', '-', str_replace('.', '-', $ability->name)) }}-pane" role="tabpanel">
                        <div class="form-group{{ $errors->has($ability->name . '-users') ? ' has-danger' : '' }}">
                            {!! Form::label($ability->name . '-users', 'Users') !!}
                            {!! Form::select($ability->name . '[users][]', $users, $ability->users->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => true, 'placeholder' => 'Select Users..']) !!}

                            {!! $errors->first($ability->name . '[users]', '<div class="form-control-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group{{ $errors->has($ability->name . '-roles') ? ' has-danger' : '' }}">
                            {!! Form::label($ability->name . '-roles', 'Roles') !!}
                            {!! Form::select($ability->name . '[roles][]', $roles, $ability->roles->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => true]) !!}

                            {!! $errors->first($ability->name . '[roles]', '<div class="form-control-feedback">:message</div>') !!}
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Select list for roles and users --}}

    {{ Form::close() }}
@endsection