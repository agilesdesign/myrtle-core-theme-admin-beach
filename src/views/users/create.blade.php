@extends('admin::index')

@section('page-title')
    Users
@endsection

@section('page-description')
    Add a new user
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'user-create'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.users.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    @component('admin::components.form', ['method' => 'POST', 'action' => route('admin.users.store'), 'id' => 'user-create'])
        @slot('fields')
            <div class="row">
                <div class="col-xs-6">
                    <h2>Account</h2>
                    @include('admin::users.form.fields.emails')
                    @include('admin::users.form.fields.password')
                </div>
                <div class="col-xs-6">
                    <h2>Name</h2>
                    @include('admin::person.names.legal.fields')
                </div>
            </div>
        @endslot
    @endcomponent
@endsection