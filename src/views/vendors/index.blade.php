@extends('admin::layouts.content.dock.partials.items')

@section('page-title')
    Vendors
@endsection

@section('page-description')
    {{ $dock->description }}
@endsection

@section('search')
    @include('admin::layouts.content.dock.partials.items.search')
@endsection

@section('toolbar')
    @can('create', Myrtle\Vendors\Policies\VendorsPolicy::class)
        <a class="btn btn-outline-success" href="{{ route('admin.vendors.create') }}" data-toggle="tooltip" data-placement="bottom" title="New">
            <i class="fa fa-fw fa-plus-square"></i>
            New
        </a>
    @endcan
    @can('vendors.admin')
        <a class="btn btn-secondary" href="{{ route('admin.docks.permissions.edit', $dock->name) }}" data-toggle="tooltip" data-placement="bottom" title="Permissions">
            <i class="fa fa-fw fa-lock"></i>
            Permissions
        </a>
    @endcan
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item active">Vendors</span>
@endsection

@section('items')
    <table class="table table-hover table-outline mb-0 hidden-sm-down">
        <thead class="thead-default">
            <tr>
                {{--<th class="text-xs-center">--}}
                    {{--<i class="fa fa-fw fa-users"></i>--}}
                {{--</th>--}}
                <th>Vendor</th>
                <th>Business Type</th>
                <th>Founded</th>
                <th>Website</th>
                <th class="text-xs-right">Locations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
                <tr>
                    {{--<td class="text-xs-center">--}}
                        {{--<div class="avatar">--}}
                            {{--<img src="" class="img-avatar" alt="admin@bootstrapmaster.com">--}}
                            {{--<span class="avatar-status tag-success"></span>--}}
                        {{--</div>--}}
                    {{--</td>--}}
                    <td>
                        <a href="{{ route('admin.vendors.show', $vendor) }}">
                            {{ $vendor->legal_name }}
                        </a>
                        <div class="small text-muted">
                            @foreach($vendor->commodities as $commodity)
                                <span class="tag tag-xs tag-primary">{{ $commodity->name }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="text-xs-right">
                        {{ $vendor->locations->count(1) ?? '' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('pagination')
    {{ $vendors->links() }}
@endsection