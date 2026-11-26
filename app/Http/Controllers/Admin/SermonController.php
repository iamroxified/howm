<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SermonController extends Controller
{
    /**
     * Display a listing of sermons
     */
    public function index()
    {
        $sermons = Sermon::all();
        return view('admin.sermon.index', compact('sermons'));
    }

    /**
     * Show the form for creating a new sermon
     */
    public function create()
    {
        return view('admin.sermon.create');
    }

    /**
     * Store a newly created sermon in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ser_name' => 'required|string|max:255',
            'ser_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ser_desc' => 'nullable|string',
            'ser_link' => 'nullable|url',
            'ser_cat' => 'nullable|string|max:255',
            'ser_date' => 'nullable|date',
        ]);

        if ($request->hasFile('ser_img')) {
            $imagePath = $request->file('ser_img')->store('sermons', 'public');
            $validated['ser_img'] = $imagePath;
        }

        Sermon::create($validated);

        return redirect()->route('sermon.index')->with('success', 'Sermon created successfully.');
    }

    /**
     * Display the specified sermon
     */
    public function show(Sermon $sermon)
    {
        return view('admin.sermon.show', compact('sermon'));
    }

    /**
     * Show the form for editing the sermon
     */
    public function edit(Sermon $sermon)
    {
        return view('admin.sermon.edit', compact('sermon'));
    }

    /**
     * Update the sermon in storage
     */
    public function update(Request $request, Sermon $sermon)
    {
        $validated = $request->validate([
            'ser_name' => 'required|string|max:255',
            'ser_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ser_desc' => 'nullable|string',
            'ser_link' => 'nullable|url',
            'ser_cat' => 'nullable|string|max:255',
            'ser_date' => 'nullable|date',
        ]);

        if ($request->hasFile('ser_img')) {
            if ($sermon->ser_img && Storage::disk('public')->exists($sermon->ser_img)) {
                Storage::disk('public')->delete($sermon->ser_img);
            }
            $imagePath = $request->file('ser_img')->store('sermons', 'public');
            $validated['ser_img'] = $imagePath;
        }

        $sermon->update($validated);
        return redirect()->route('sermon.index')->with('success', 'Sermon updated successfully.');
    }

    /**
     * Remove the sermon from storage
     */
    public function destroy(Sermon $sermon)
    {
        if ($sermon->ser_img && Storage::disk('public')->exists($sermon->ser_img)) {
            Storage::disk('public')->delete($sermon->ser_img);
        }

        $sermon->delete();
        return redirect()->route('sermon.index')->with('success', 'Sermon deleted successfully.');
    }
}
