<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        $test = '';

        return view('index', compact('test'));
    }
}
