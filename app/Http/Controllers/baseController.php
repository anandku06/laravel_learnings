<?php

namespace App\Http\Controllers;

class baseController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }
}
