@extends('admin::index')

@section('page-title')
    Application
@endsection

@section('page-description')
    Configuration
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'configuration-app-edit'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.configurations.app.edit') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item">Configuration</span>
    <span class="breadcrumb-item active">Application</span>
@endsection

@section('dock')
    @component('admin::components.form', ['method' => 'PATCH', 'action' => route('admin.configurations.app.update'), 'id' => 'configuration-app-edit'])
        @slot('fields')
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#basic" role="tab">Basic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#system" role="tab">System</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="basic" role="tabpanel">
                    @include('admin::configurations.app.form.fields.basic')
                </div>
                <div class="tab-pane" id="system" role="tabpanel">
                    @include('admin::configurations.app.form.fields.system')
                </div>
            </div>
        @endslot
    @endcomponent
@endsection