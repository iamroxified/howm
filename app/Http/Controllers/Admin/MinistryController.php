<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MinistryController extends Controller
{
    /**
     * Display a listing of ministries
     */
    public function index()
    {
        $ministries = Ministry::all();
        return view('admin.ministry.index', compact('ministries'));
    }

    /**
     * Show the form for creating a new ministry
     */
    public function create()
    {
        return view('admin.ministry.create');
    }

    /**
     * Store a newly created ministry in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'min_name' => 'required|string|max:255',
            'min_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'min_desc' => 'nullable|string',
            'min_lead' => 'nullable|string|max:255',
            'min_vis' => 'nullable|string',
            'min_mis' => 'nullable|string',
            'min_link' => 'nullable|url',
            'min_cat' => 'nullable|string|max:255',
            'min_date' => 'nullable|date',
            'min_loc' => 'nullable|string',

        ]);

        if ($request->hasFile('min_img')) {
            $imagePath = $request->file('min_img')->store('ministry', 'public');
            $validated['min_img'] = $imagePath;
        }

        Ministry::create($validated);

        return redirect()->route('admin.ministry.index')->with('success', 'Ministry created successfully.');
    }

    /**
     * Display the specified ministry
     */
    public function show(Ministry $ministry)
    {
        return view('admin.ministry.show', compact('ministry'));
    }

    /**
     * Show the form for editing the ministry
     */
    public function edit(Ministry $ministry)
    {
        return view('admin.ministry.edit', compact('ministry'));
    }

    /**
     * Update the ministry in storage
     */
    public function update(Request $request, Ministry $ministry)
    {
        $validated = $request->validate([
            'min_name' => 'required|string|max:255',
            'min_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'min_desc' => 'nullable|string',
            'min_lead' => 'nullable|string|max:255',
            'min_vis' => 'nullable|string',
            'min_mis' => 'nullable|string',
            'min_link' => 'nullable|url',
            'min_cat' => 'nullable|string|max:255',
            'min_date' => 'nullable|date',
            'min_loc' => 'nullable|string'
        ]);

        if ($request->hasFile('min_img')) {
            if ($ministry->min_img && Storage::disk('public')->exists($ministry->min_img)) {
                Storage::disk('public')->delete($ministry->min_img);
            }
            $imagePath = $request->file('min_img')->store('ministry', 'public');
            $validated['min_img'] = $imagePath;
        }

        $ministry->update($validated);
        return redirect()->route('admin.ministry.index')->with('success', 'Ministry updated successfully.');
    }

    /**
     * Remove the ministry from storage
     */
    public function destroy(Ministry $ministry)
    {
        if ($ministry->min_img && Storage::disk('public')->exists($ministry->min_img)) {
            Storage::disk('public')->delete($ministry->min_img);
        }

        $ministry->delete();
        return redirect()->route('admin.ministry.index')->with('success', 'Ministry deleted successfully.');
    }
}
