@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Contacts
            <span class="pull-right">
                <a href="{{ url('/contacts/create') }}" class="btn btn-success btn-xs"><i class="fa fa-fw fa-plus"></i> New</a>
            </span>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                @foreach($contacts as $contact)
                    <li class="list-group-item clearfix">
                        <span class="pull-right">
                            <a class="btn-default btn-xs" href="{{ url('contacts/' . $contact->id . '/edit') }}">
                                <i class="fa fa-fw fa-pencil"></i>
                            </a>
                            <a class="btn-danger btn-xs" href="{{ url('contacts/' . $contact->id . '/edit') }}">
                                <i class="fa fa-fw fa-trash"></i>
                            </a>
                        </span>
                        <address>
                            <strong><a href="{{ url('/contacts/' . $contact-> id) }}">{{ $contact->name }}</a></strong><br>
                            {{ $contact->addresses[0]->street }}<br>
                            {{ $contact->addresses[0]->city }}, {{ $contact->addresses[0]->state }} {{ $contact->addresses[0]->zip }}<br>
                            <abbr title="Phone">P:</abbr> {{ $contact->phones[0]->phone }} <br>
                        </address>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection