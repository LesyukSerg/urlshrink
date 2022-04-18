@extends('layouts.layout')
@section('content')
    <div>
        @foreach($data as $one)
            <div class="row">
                <div class="col-7 overflow-hidden alert alert-secondary"><a href="{{ route("StatUrlOne", ['url' => $one->url_short]) }}">{{ $one->url_original }}</a></div>
                <div class="col-1 alert alert-secondary text-center">{{ $one->url_short }}</div>
                <div class="col-2 alert alert-secondary">{{ $one->date_to }}</div>
                <div class="col-1 alert alert-secondary text-center">{{ $one->use_count }}</div>
                <div class="col-1 alert alert-danger del-link text-center" data-href="{{ route('url.delete', ['url' => $one->url_short]) }}"><b>X</b></div>
            </div>
        @endforeach
    </div>
@endsection