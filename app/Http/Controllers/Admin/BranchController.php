<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    /**
     * Display a listing of branches
     */
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new branch
     */
    public function create()
    {
        return view('admin.branches.create');
    }

    /**
     * Store a newly created branch in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bran_name' => 'required|string|max:255',
            'bran_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bran_desc' => 'nullable|string',
            'bran_loc' => 'nullable|string|max:255',
            'bran_pst' => 'nullable|string|max:255',
            'bran_pst_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bran_phone' => 'nullable|string|max:20',
            'bran_email' => 'nullable|email|max:255',
        ]);

        // Handle branch image upload
        if ($request->hasFile('bran_img')) {
            $imagePath = $request->file('bran_img')->store('branches', 'public');
            $validated['bran_img'] = $imagePath;
        }

        // Handle pastor image upload
        if ($request->hasFile('bran_pst_img')) {
            $imagePath = $request->file('bran_pst_img')->store('branches', 'public');
            $validated['bran_pst_img'] = $imagePath;
        }

        Branch::create($validated);

        return redirect()->route('admin.branches.index')->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified branch
     */
    public function show(Branch $branch)
    {
        return view('admin.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the branch
     */
    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    /**
     * Update the branch in storage
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'bran_name' => 'required|string|max:255',
            'bran_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bran_desc' => 'nullable|string',
            'bran_loc' => 'nullable|string|max:255',
            'bran_pst' => 'nullable|string|max:255',
            'bran_pst_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bran_phone' => 'nullable|string|max:20',
            'bran_email' => 'nullable|email|max:255',
        ]);

        // Handle branch image upload
        if ($request->hasFile('bran_img')) {
            if ($branch->bran_img && Storage::disk('public')->exists($branch->bran_img)) {
                Storage::disk('public')->delete($branch->bran_img);
            }
            $imagePath = $request->file('bran_img')->store('branches', 'public');
            $validated['bran_img'] = $imagePath;
        }

        // Handle pastor image upload
        if ($request->hasFile('bran_pst_img')) {
            if ($branch->bran_pst_img && Storage::disk('public')->exists($branch->bran_pst_img)) {
                Storage::disk('public')->delete($branch->bran_pst_img);
            }
            $imagePath = $request->file('bran_pst_img')->store('branches', 'public');
            $validated['bran_pst_img'] = $imagePath;
        }

        $branch->update($validated);
        return redirect()->route('admin.branches.index')->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the branch from storage
     */
    public function destroy(Branch $branch)
    {
        // Delete images
        if ($branch->bran_img && Storage::disk('public')->exists($branch->bran_img)) {
            Storage::disk('public')->delete($branch->bran_img);
        }
        if ($branch->bran_pst_img && Storage::disk('public')->exists($branch->bran_pst_img)) {
            Storage::disk('public')->delete($branch->bran_pst_img);
        }

        $branch->delete();
        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted successfully.');
    }
}
