@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-12"><b>{{ trans('oneUrl.short-url') }}:</b> <a href="{{ route('shortUrl', ['url' => $data->url_short]) }}">{{ route('shortUrl', ['url' => $data->url_short]) }}</a></div>
        <div class="col-12"><b>{{ trans('oneUrl.created') }}:</b> {{ $data->created_at }}</div>
        <div class="col-12"><b>{{ trans('oneUrl.use-count') }}:</b> <span class="count">{{ $data->use_count }}</span></div>
        <div class="col-12"><b>{{ trans('oneUrl.base-url') }}:</b> <span class="link">{{ $data->url_original }}</span></div>
        <div class="col-12"><b>{{ trans('oneUrl.active-to') }}:</b> <span class="date">{{ str_replace(' ', 'T', $data->date_to) }}</span></div>
    </div>
    <input type="button" class="btn btn-secondary edit_url" value="{{ trans('oneUrl.edit') }}">
    <input type="button" class="btn btn-primary change_url hidden" data-href="{{ route('url.update', ['url' => $data->url_short]) }}" value="{{ trans('oneUrl.change') }}">
    <input type="button" class="btn btn-danger cancel hidden" value="{{ trans('oneUrl.cancel') }}">
@endsection