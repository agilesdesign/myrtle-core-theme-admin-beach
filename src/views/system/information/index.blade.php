@extends('admin::index')

@section('page-title')
    System Information
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item">System</span>
    <span class="breadcrumb-item active">Information</span>
@endsection

@section('dock')
    Server
    {{ dump($server) }}
    Database
    {{ dump($database) }}
    Agent
    {{ dump($agent) }}
@endsection