@extends('admin::index')

@section('page-title')
    Migrations
@endsection

@section('page-description')
    Databases
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item">Databases</span>
    <span class="breadcrumb-item active">Migrations</span>
@endsection

@section('dock')
    <table class="table table-hover table-outline mb-0">
        <thead class="thead-default">
        <tr>
            <th>name</th>
            <th>batch</th>
        </tr>
        </thead>
        <tbody>
        @foreach($migrations as $migration)
            <tr>
                <td>{{ $migration->migration }}</td>
                <td>{{ $migration->batch }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection