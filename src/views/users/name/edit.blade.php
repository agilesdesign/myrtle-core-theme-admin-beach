@extends('admin::index')

@section('page-title')
    Name
@endsection

@section('page-description')
    {{ $user->name->firstLast }}
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'user-name-edit'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.show', $user) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    @component('admin::components.form', ['method' => 'PUT', 'action' => route('admin.users.name.update', $user), 'id' => 'user-name-edit'])
    @slot('fields')
    <div class="row">
        <div class="col-xs-6">
            <h2>Legal</h2>
            @include('admin::person.names.legal.fields')
        </div>
        <div class="col-xs-6">
            <h2>Additional</h2>
            @include('admin::person.names.additional.fields')
        </div>
    </div>
    @endslot
    @endcomponent
@endsection