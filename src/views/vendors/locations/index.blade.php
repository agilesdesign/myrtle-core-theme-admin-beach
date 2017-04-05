@extends('admin::index')

@section('page-title')
    Locations
    <small class="pull-right">
        <a href="{{ route('admin.vendors.show', $vendor->id) }}">
            {{ $vendor->name->legal }}
        </a>
    </small>
@endsection


{{--todo: Check Gate for button permissions--}}
@section('toolbar')
    <a class="btn btn-success" href="{{ route('admin.vendors.locations.create', $vendor->id) }}">
        <i class="fa fa-fw fa-plus"></i>
        New
    </a>
@endsection

@section('content')
    <ul class="list-group locations">
        @foreach($locations as $location)
            <li class="list-group-item location">
                <div class="pull-right actions hidden-sm-up">
                    <a href="{{ route('admin.vendors.locations.edit', [$vendor->id, $location->id]) }}" class="edit">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </div>
                <h5>
                    <a href="{{ route('admin.vendors.locations.show', [$vendor->id, $location->id]) }}">
                        {{ $location->name }}
                    </a>
                </h5>
                {{--@if($organization->primaryAddress || !$organization->phones->isEmpty())--}}
                    {{--<address>--}}
                        {{--@if($organization->primaryAddress)--}}
                            {{--{{ $organization->primaryAddress->type->name }}<br>--}}
                            {{--{{ $organization->primaryAddress->street }}<br>--}}
                            {{--{{ $organization->primaryAddress->city }}, {{ $organization->primaryAddress->state }} {{ $organization->primaryAddress->zip }}<br>--}}
                        {{--@endif--}}
                        {{--@if(!$organization->phones->isEmpty())--}}
                            {{--<abbr title="Phone">P:</abbr> {{$organization->phones[0]->phone}} <br>--}}
                        {{--@endif--}}
                        {{--@foreach($organization->commodities as $commodity)--}}
                            {{--<span class="tag tag-default"> {{ $commodity->name }} </span>--}}
                        {{--@endforeach--}}
                    {{--</address>--}}
                {{--@endif--}}
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $locations->links() }}
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.location').hover(
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                    },
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                    }
            );
        });
    </script>
@endsection