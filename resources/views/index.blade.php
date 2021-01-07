@extends('layouts.layout')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form class="url-shrinker" method="post" action="#">
        <div class="row">
            <div class="form-group text-center col-8">
                <input class="form-control link" type="url" name="link" placeholder="https://test.com" value="">
            </div>
            <div class="form-group text-center col-4">
                <select class="form-control lifetime" name="lifetime">
                    <option value="1">на 1 час</option>
                    <option value="3">на 3 часа</option>
                    <option value="6">на 6 часов</option>
                    <option value="12">на 12 часов</option>
                    <option value="24">на 24 часа</option>
                </select>
            </div>
        </div>

        <div class="form-group text-center">
            <input type="button" class="btn btn-primary get_url" value="Сжать урл">
        </div>
    </form>
    <div class="result"></div>
@endsection