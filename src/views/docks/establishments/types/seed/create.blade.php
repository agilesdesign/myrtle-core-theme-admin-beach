@extends('admin::index')

@section('page-title')
    Establishment Types Seed
@endsection

@section('page-description')
    Pre-populate Establishment Types
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.docks.index') }}" class="breadcrumb-item">Docks</a>
    <span class="breadcrumb-item">Establishments</span>
    <span class="breadcrumb-item">Types</span>
    <span class="breadcrumb-item">Seed</span>
    <span class="breadcrumb-item active">Create</span>
@endsection

@section('dock')
    <div class="alert alert-info text-xs-center mb-3" role="alert">
        <h4>The Establishments Dock supplies a list of predefined Establishment Types</h4>
        <h5>Would you like to use these?</h5>
        <ul class="list-group mt-2">
            @foreach($types as $type)
                <li class="list-group-item">{{ $type }}</li>
            @endforeach
        </ul>
        <div class="mt-2">
            {{ Form::open(['route' => ['admin.docks.establishments.types.seed.store'], 'method' => 'POST', 'id' => 'seed-genders']) }}
            <div class="btn-group">
                {{ Form::button('<i class="fa fa-fw fa-check"></i> Seed', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'seed-genders'] ) }}
                <a class="btn btn-danger" href="{{ url()->previous() }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection