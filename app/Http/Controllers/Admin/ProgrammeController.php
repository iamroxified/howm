<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $programmes = Programme::all();
        return view('admin.programme.index', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programme.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prg_title' => 'required|string|max:255',
            'prg_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'prg_desc' => 'nullable|string',
            'prg_cat' => 'nullable|string',
            'prg_loc' => 'nullable|string|max:255',
            'prg_start' => 'nullable|date',
            'prg_end' => 'nullable|date',
            'prg_time' => 'nullable|string|max:255',
        ]);

        try {
            if ($request->hasFile('prg_img')) {
                $imagePath = $request->file('prg_img')->store('programmes', 'public');
                $validated['prg_img'] = $imagePath;
            }

            Programme::create($validated);

            return redirect()->route('admin.programme.index')->with('success', 'Programme created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.programme.create')->with('error', 'Failed to create programme: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        return view('admin.programme.show', ['programme' => $programme]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programme $programme)
    {
        return view('admin.programme.edit', ['programme' => $programme]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programme $programme)
    {
        $validated = $request->validate([
            'prg_title' => 'required|string|max:255',
            'prg_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'prg_desc' => 'nullable|string',
            'prg_cat' => 'nullable|string',
            'prg_loc' => 'nullable|string|max:255',
            'prg_start' => 'nullable|date',
            'prg_end' => 'nullable|date',
            'prg_time' => 'nullable|string|max:255',
        ]);

        try {
            if ($request->hasFile('prg_img')) {
                if ($programme->prg_img && Storage::disk('public')->exists($programme->prg_img)) {
                    Storage::disk('public')->delete($programme->prg_img);
                }
                $imagePath = $request->file('prg_img')->store('programmes', 'public');
                $validated['prg_img'] = $imagePath;
            }

            $programme->update($validated);

            return redirect()->route('admin.programme.index')->with('success', 'Programme updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.programme.edit', $programme->id)->with('error', 'Failed to update programme: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programme $programme)
    {
        try {
            // Delete the image file from storage if it exists
            if ($programme->prg_img && Storage::disk('public')->exists($programme->prg_img)) {
                Storage::disk('public')->delete($programme->prg_img);
            }

            $programme->delete();

            return redirect()->route('admin.programme.index')->with('success', 'Programme deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.programme.index')->with('error', 'Failed to delete programme: ' . $e->getMessage());
        }
    }
}
