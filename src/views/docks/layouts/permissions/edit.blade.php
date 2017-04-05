@extends('admin::index')

@section('page-title')
    {{ trans($dock->name . '.dock.name') }}
@endsection

@section('page-description')
    {{ trans('myrtle.permissions') }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.docks.index') }}" class="breadcrumb-item">Docks</a>
    <span class="breadcrumb-item">{{ trans($dock->name . '.dock.name') }}</span>
    <span class="breadcrumb-item">Permissions</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-permissions'] ) }}
    <a class="btn btn-outline-warning" href="{{ url()->previous() }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {{ Form::open(['route' => ['admin.docks.permissions.update', $dock->name], 'method' => 'PUT', 'id' => 'edit-permissions']) }}

    <div class="row">
        {{-- Tab for each permission --}}
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                @foreach($dock->abilities as $ability)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ str_replace('\\', '-', str_replace('.', '-', $ability->name)) }}-pane" role="tab">
                             {{ Config::get('abilities.' . $ability->name) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @foreach($dock->abilities as $ability)
                    <div class="tab-pane {{ $loop->first ? 'active' : ''}}" id="{{ str_replace('\\', '-', str_replace('.', '-', $ability->name)) }}-pane" role="tabpanel">
                        {{ dd($ability) }}
                        @section('permission-fields')
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Select list for roles and users --}}

    {{ Form::close() }}
@endsection