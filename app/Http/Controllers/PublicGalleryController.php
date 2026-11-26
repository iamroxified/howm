<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Ministry;
use Illuminate\Http\Request;

class PublicGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ministries = Ministry::all();
        $galleries = Gallery::latest()->simplePaginate(12);
        return view('gallery', compact('galleries','ministries'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $other_galleries = Gallery::where('id', '!=', $gallery->id)->latest()->take(5)->get();
        return view('gallery_detail', compact('gallery', 'other_galleries'));
    }
}
