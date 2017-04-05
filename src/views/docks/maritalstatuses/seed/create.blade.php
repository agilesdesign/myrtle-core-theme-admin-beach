@extends('admin::index')

@section('page-title')
    Marital Status Seed
@endsection

@section('page-description')
    Pre-populate Marital Statuses
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.docks.index') }}" class="breadcrumb-item">Docks</a>
    <span class="breadcrumb-item">Marital Stasuses</span>
    <span class="breadcrumb-item">Seed</span>
    <span class="breadcrumb-item active">Create</span>
@endsection

@section('dock')
    <div class="alert alert-info text-xs-center mb-3" role="alert">
        <h4>The Marital Status Dock supplies a list of predefined stauses</h4>
        <h5>Would you like to use these?</h5>
        <ul class="list-group mt-2">
            @foreach($statuses as $status)
                <li class="list-group-item">{{ $status }}</li>
            @endforeach
        </ul>
        <div class="mt-2">
            {{ Form::open(['route' => ['admin.docks.maritalstatuses.seed.store'], 'method' => 'POST', 'id' => 'seed-maritalstatuses']) }}
            <div class="btn-group">
                {{ Form::button('<i class="fa fa-fw fa-check"></i> Seed', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'seed-maritalstatuses'] ) }}
                <a class="btn btn-danger" href="{{ url()->previous() }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection