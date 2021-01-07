@extends('layouts.layout')
@section('content')
    <div>
        @foreach($data as $one)
            <div class="row">
                <div class="col-6"><a href="{{ route("StatUrlOne", ['url' => $one->url_short]) }}">{{ $one->url_original }}</a></div>
                <div class="col-2">{{ $one->url_short }}</div>
                <div class="col-3">{{ $one->date_to }}</div>
                <div class="col-1">{{ $one->use_count }}</div>
            </div>
        @endforeach
    </div>
@endsection