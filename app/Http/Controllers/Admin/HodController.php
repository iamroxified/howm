<?php

namespace App\Http\Controllers;

use App\Models\Hod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HodController extends Controller
{
    /**
     * Display a listing of HOD items
     */
    public function index()
    {
        $hods = Hod::all();
        return view('admin.hod.index', compact('hods'));
    }

    /**
     * Show the form for creating a new HOD item
     */
    public function create()
    {
        return view('admin.hod.create');
    }

    /**
     * Store a newly created HOD item in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hod_name' => 'required|string|max:255',
            'hod_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hod_desc' => 'nullable|string',
            'hod_link' => 'nullable|url',
            'hod_cat' => 'nullable|string|max:255',
            'hod_date' => 'nullable|date',
        ]);

        if ($request->hasFile('hod_img')) {
            $imagePath = $request->file('hod_img')->store('hod', 'public');
            $validated['hod_img'] = $imagePath;
        }

        Hod::create($validated);

        return redirect()->route('hod.index')->with('success', 'HOD item created successfully.');
    }

    /**
     * Display the specified HOD item
     */
    public function show(Hod $hod)
    {
        return view('admin.hod.show', compact('hod'));
    }

    /**
     * Show the form for editing the HOD item
     */
    public function edit(Hod $hod)
    {
        return view('admin.hod.edit', compact('hod'));
    }

    /**
     * Update the HOD item in storage
     */
    public function update(Request $request, Hod $hod)
    {
        $validated = $request->validate([
            'hod_name' => 'required|string|max:255',
            'hod_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hod_desc' => 'nullable|string',
            'hod_link' => 'nullable|url',
            'hod_cat' => 'nullable|string|max:255',
            'hod_date' => 'nullable|date',
        ]);

        if ($request->hasFile('hod_img')) {
            if ($hod->hod_img && Storage::disk('public')->exists($hod->hod_img)) {
                Storage::disk('public')->delete($hod->hod_img);
            }
            $imagePath = $request->file('hod_img')->store('hod', 'public');
            $validated['hod_img'] = $imagePath;
        }

        $hod->update($validated);
        return redirect()->route('hod.index')->with('success', 'HOD item updated successfully.');
    }

    /**
     * Remove the HOD item from storage
     */
    public function destroy(Hod $hod)
    {
        if ($hod->hod_img && Storage::disk('public')->exists($hod->hod_img)) {
            Storage::disk('public')->delete($hod->hod_img);
        }

        $hod->delete();
        return redirect()->route('hod.index')->with('success', 'HOD item deleted successfully.');
    }
}
