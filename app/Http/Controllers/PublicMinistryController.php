<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use App\Models\Programme;
use Illuminate\Http\Request;

class PublicMinistryController extends Controller
{
    public function index()
    {
        $minitries = Ministry::latest()->simplePaginate(10);
        return view('ministry', compact('ministries'));
    }

    public function show(Ministry $ministry)
    {
        $ministries = Ministry::all();
        $programmes = Programme::all();

        return view('ministry_detail', compact('ministry','ministries','programmes'));
    }
}
