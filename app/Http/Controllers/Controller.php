<?php

namespace App\Http\Controllers;

use App\Models\Ministry;

abstract class Controller
{
    public function index(){

    $ministries = Ministry::all();
    return view('gallery',compact('ministries'));

    }
}
