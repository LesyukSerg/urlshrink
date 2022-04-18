@extends('layouts.layout')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form class="url-shrinker" method="post" action="{{ route("url.create") }}">
        <div class="row">
            <div class="form-group text-center col-8">
                <input class="form-control link" type="url" name="link" placeholder="https://test.com" value="">
            </div>
            <div class="form-group text-center col-4">
                <select class="form-control lifetime" name="lifetime">
                    <option value="1">{{ trans('index.hour.1') }}</option>
                    <option value="3">{{ trans('index.hour.3') }}</option>
                    <option value="6">{{ trans('index.hour.6') }}</option>
                    <option value="12">{{ trans('index.hour.12') }}</option>
                    <option value="24">{{ trans('index.hour.24') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group text-center">
            <input type="button" class="btn btn-primary get_url" value="{{ trans('index.shrink') }}">
        </div>
    </form>
    <div class="result"></div>
@endsection