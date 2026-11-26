<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use App\Models\Sermon;
use Illuminate\Http\Request;

class PublicSermonController extends Controller
{
    public function index()
    {
        $sermons = Sermon::latest()->simplePaginate(10);

        return view('sermon', compact('sermons'));
    }

    public function show(Sermon $sermon)
    {
        $sermons = Sermon::latest()->take(5)->get();
        return view('sermon_detail', compact('sermon', 'sermons'));
    }
}
