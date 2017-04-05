@extends('admin::index')

@section('page-title')
    Address Types Seed
@endsection

@section('page-description')
    Pre-populate Address Type
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.docks.index') }}" class="breadcrumb-item">Docks</a>
    <span class="breadcrumb-item">Addresses</span>
    <span class="breadcrumb-item">Seed</span>
    <span class="breadcrumb-item active">Create</span>
@endsection

@section('dock')
    <div class="alert alert-info text-xs-center mb-3" role="alert">
        <h4>The Addresses Dock supplies a list of predefined Address Types</h4>
        <h5>Would you like to use these Address Types?</h5>
        <ul class="list-group mt-2">
            @foreach($types as $type)
                <li class="list-group-item">{{ $type }}</li>
            @endforeach
        </ul>
        <div class="mt-2">
            {{ Form::open(['route' => ['admin.docks.addresses.types.seed.store'], 'method' => 'POST', 'id' => 'seed-address-types']) }}
            <div class="btn-group">
                {{ Form::button('<i class="fa fa-fw fa-check"></i> Seed', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'seed-address-types'] ) }}
                <a class="btn btn-danger" href="{{ url()->previous() }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection