<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\Ministry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the home page
     */
    public function index()
    {
        $programmes = Programme::latest()->take(3)->get();
        $ministries = Ministry::all();
        return view('home', compact('programmes','ministries'));

    }


}
