<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use App\Models\Programme;
use Illuminate\Http\Request;

class PublicProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::latest()->simplePaginate(10);

        return view('programme', compact('programmes'));
    }

    public function show(Programme $programme)
    {
        $programmes = Programme::latest()->take(5)->get();
        return view('programme_detail', compact('programme', 'programmes'));
    }
}
