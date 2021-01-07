@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-5">Оригинальный урл</div>
        <div class="col-2">Короткий</div>
        <div class="col-2">Активен до</div>
        <div class="col-1">Кол-во</div>
        <div class="col-2">Дата перехода</div>
    </div>
    <div class="row">
        <div class="col-5"><a href="{{ route("UrlRedirect", ['url' => $data->url_short]) }}">{{ $data->url_original }}</a></div>
        <div class="col-2">{{ $data->url_short }}</div>
        <div class="col-2">{{ $data->date_to }}</div>
        <div class="col-1">{{ $data->use_count }}</div>
        <div class="col-2">{{ $data->updated_at }}</div>
    </div>
@endsection