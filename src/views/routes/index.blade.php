@extends('admin::index')

@section('page-title')
    Routes
@endsection

@section('page-description')
    {{ $dock->description }}
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item active">Routes</span>
@endsection

@section('toolbar')
    @can('routes.admin')
        <a class="btn btn-secondary" href="{{ route('admin.docks.permissions.edit', $dock->name) }}">
            <i class="fa fa-fw fa-lock"></i>
            {{ trans('myrtle.permissions') }}
        </a>
    @endcan
@endsection

@section('dock')
    <?php $methods = [ 'GET' => ['color' => 'primary'], 'HEAD' => ['color' => 'default'], 'POST' => ['color' => 'success'], 'PUT' => ['color' => 'warning'], 'PATCH' => ['color' => 'info'], 'DELETE' => ['color' => 'danger']]; ?>
    <table class="table table-hover table-bordered table-sm table-striped" style="font-size: 0.8rem;">
        <thead class="bg-primary">
            <tr>
                <th>Method</th>
                <th>Path</th>
                <th>Action</th>
                <th>Information</th>
            </tr>
        </thead>
        <tbody>
            @foreach($routes as $route)
                <tr>
                    <td>
                        @foreach($route->methods() as $method)
                                <span class="tag tag-{{ $methods[$method]['color'] }}">{{ $method }}</span>
                        @endforeach
                    </td>
                    <td>
                        {!!  preg_replace('#({[^}]+})#', '<span class="text-danger">$1</span>', $route->uri()) !!}
                    </td>
                    <td>
                        {!! preg_replace('#(@.*)$#', '<span class="text-danger">$1</span>', \Illuminate\Support\Str::replaceFirst('App\Http\Controllers\\', '', $route->getActionName())) !!}
                    </td>
                    <td>
                        @if($route->getName())
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="popover" data-container="body" data-trigger="hover" data-placement="left" data-content="{{ $route->getName() }}">
                                Name
                            </button>
                        @endif
                        @if(!empty($route->middleware()))
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="popover" data-container="body" data-trigger="hover" data-placement="top" data-content="{{ implode(',', $route->middleware()) }}">
                                Middleware
                            </button>
                        @endif
                    </td>
                    <td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>
@endpush