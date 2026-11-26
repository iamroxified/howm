<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery items
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery item
     */
    public function create()
    {
        $ministries = Ministry::all();
        return view('admin.gallery.create', compact('ministries'));
    }

    /**
     * Store a newly created gallery item in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gal_name' => 'required|string|max:255',
            'gal_img' => 'nullable',
            'gal_img.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gal_desc' => 'nullable|string',
            'gal_cat' => 'nullable|string|max:255',
            'gal_date' => 'nullable|date',
        ]);

        $imagePaths = [];
        if ($request->hasFile('gal_img')) {
            foreach ($request->file('gal_img') as $image) {
                $imagePath = $image->store('gallery', 'public');
                $imagePaths[] = $imagePath;
            }
        }

        $validated['gal_img'] = $imagePaths;
        Gallery::create($validated);

        return redirect()->route('gallery.index')->with('success', 'Gallery item(s) created successfully.');
    }

    /**
     * Display the specified gallery item
     */
    public function show(Gallery $gallery)
    {
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the gallery item
     */
    public function edit(Gallery $gallery)
    {
        $ministries = Ministry::all();
        return view('admin.gallery.edit', compact('gallery', 'ministries'));
    }

    /**
     * Update the gallery item in storage
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'gal_name' => 'required|string|max:255',
            'gal_img' => 'nullable',
            'gal_img.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gal_desc' => 'nullable|string',
            'gal_cat' => 'nullable|string|max:255',
            'gal_date' => 'nullable|date',
        ]);

        if ($request->hasFile('gal_img')) {
            // Delete old images
            if ($gallery->gal_img && is_array($gallery->gal_img)) {
                foreach ($gallery->gal_img as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }

            // Store new images as array
            $imagePaths = [];
            foreach ($request->file('gal_img') as $image) {
                $imagePath = $image->store('gallery', 'public');
                $imagePaths[] = $imagePath;
            }
            $validated['gal_img'] = $imagePaths;
        }

        $gallery->update($validated);
        return redirect()->route('gallery.index')->with('success', 'Gallery item updated successfully.');
    }

    /**
     * Remove the gallery item from storage
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->gal_img && is_array($gallery->gal_img)) {
            foreach ($gallery->gal_img as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery item deleted successfully.');
    }
}
