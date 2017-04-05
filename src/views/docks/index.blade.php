@extends('admin::index')

@section('page-title')
    Docks
@endsection

@section('page-description')
    {{ $dock->description }}
@endsection

@section('toolbar')
    @can('admin', Myrtle\Docks\Policies\DocksDockPolicy::class)
        <a class="btn btn-secondary" href="{{ route('admin.docks.permissions.edit', $dock->name) }}">
            <i class="fa fa-fw fa-lock"></i>
            Permissions
        </a>
    @endcan
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item active">Docks</span>
@endsection

@section('dock')
    <table class="table table-hover table-bordered table-sm table-striped" style="font-size: 0.8rem;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($docks as $dock)
                <tr>
                    <td>{{ $dock->name }}</td>
                    <td>{{ $dock->description }}</td>
                    <td class="text-xs-center">
                        <span class="btn-group btn-group-sm">
                            @if($dock->protected())
                                <a href="#" class="btn btn-secondary disabled">
                                    <i class="fa fa-fw fa-lock"></i>
                                </a>
                            @elseif($dock->enabled())
                                {{ Form::button('<i class="fa fa-fw fa-check"></i>', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'disable-dock-' . $dock->name] ) }}
                                {{ Form::open(['route' => ['admin.docks.disable', $dock->name], 'class' => 'hidden-xs hidden-xs-up', 'data-confirm' => 'disable-one', 'method' => 'PUT', 'id' => 'disable-dock-' . $dock->name])}}
                                {{ Form::close() }}
                            @else
                                {{ Form::button('<i class="fa fa-fw fa-times"></i>', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'enable-dock-' . $dock->name] ) }}
                                {{ Form::open(['route' => ['admin.docks.enable', $dock->name], 'class' => 'hidden-xs hidden-xs-up', 'data-confirm' => 'enable-one', 'method' => 'PUT', 'id' => 'enable-dock-' . $dock->name])}}
                                {{ Form::close() }}
                            @endif
                            <a href="{{ route('admin.docks.settings.edit', $dock->name) }}" class="btn btn-secondary btn-sm {{ ! $dock->hasSettings() || Gate::denies(get_class($dock) .'.admin') ? 'disabled' : '' }}">
                                <i class="fa fa-fw fa-gears"></i>
                            </a>
                            <a href="{{ route('admin.docks.permissions.edit', $dock->name) }}" class="btn btn-secondary btn-sm {{ Gate::allows(get_class($dock) .'.admin') ? '' : 'disabled' }}">
                                <i class="fa fa-fw fa-shield"></i>
                            </a>
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection