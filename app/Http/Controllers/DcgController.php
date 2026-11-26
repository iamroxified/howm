<?php

namespace App\Http\Controllers;

use App\Models\Dcg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RuntimeException;

class DcgController extends Controller
{
    public function index()
    {
        $entries = Dcg::query()->orderByDesc('date')->orderByDesc('id')->paginate(15);

        return view('admin.dcg.index', compact('entries'));
    }

    public function create()
    {
        return view('admin.dcg.form', ['entry' => new Dcg]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('file')) {
            $data['file_path'] = $this->storeFile($request);
        }

        Dcg::create($data);

        return redirect()->route('admin.dcg.index')->with('success', 'DCG entry created successfully.');
    }

    public function edit(Dcg $dcg)
    {
        return view('admin.dcg.form', ['entry' => $dcg]);
    }

    public function update(Request $request, Dcg $dcg)
    {
        $data = $this->validatedData($request, $dcg);
        $previousFile = $dcg->file_path;

        if ($request->hasFile('file')) {
            $data['file_path'] = $this->storeFile($request);
        } elseif ($data['type'] === 'writeup') {
            $data['file_path'] = null;
        }

        $dcg->update($data);

        if ($previousFile && $previousFile !== $dcg->file_path) {
            Storage::disk('local')->delete($previousFile);
        }

        return redirect()->route('admin.dcg.index')->with('success', 'DCG entry updated successfully.');
    }

    public function destroy(Dcg $dcg)
    {
        $filePath = $dcg->file_path;
        $dcg->delete();

        if ($filePath) {
            Storage::disk('local')->delete($filePath);
        }

        return redirect()->route('admin.dcg.index')->with('success', 'DCG entry deleted successfully.');
    }

    public function publicIndex()
    {
        $entries = Dcg::query()->orderByDesc('date')->orderByDesc('id')->paginate(12);

        return view('resources.dcg', compact('entries'));
    }

    public function file(Dcg $dcg)
    {
        abort_unless($dcg->file_path && Storage::disk('local')->exists($dcg->file_path), 404);

        $path = Storage::disk('local')->path($dcg->file_path);
        $mimeType = mime_content_type($path);
        $allowedMimeTypes = $dcg->type === 'image'
            ? ['image/jpeg', 'image/png', 'image/gif', 'image/webp']
            : ['application/pdf'];

        abort_unless(in_array($mimeType, $allowedMimeTypes, true), 404);

        return response()->file($path, [
            'Content-Type' => $mimeType,
            'X-Content-Type-Options' => 'nosniff',
            'Content-Security-Policy' => 'sandbox',
        ]);
    }

    private function validatedData(Request $request, ?Dcg $entry = null): array
    {
        $type = $request->input('type');
        $fileRequired = in_array($type, ['image', 'pdf'], true)
            && ($entry === null || $entry->type !== $type || ! $entry->file_path);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'type' => ['required', Rule::in(['image', 'pdf', 'writeup'])],
            'content' => ['nullable', 'required_if:type,writeup', 'string'],
            'file' => [
                $fileRequired ? 'required' : 'nullable',
                'file',
                'max:10240',
                Rule::when($type === 'image', ['image', 'mimes:jpg,jpeg,png,gif,webp']),
                Rule::when($type === 'pdf', ['mimes:pdf']),
            ],
        ]);

        unset($data['file']);

        if ($data['type'] !== 'writeup') {
            $data['content'] = null;
        }

        return $data;
    }

    private function storeFile(Request $request): string
    {
        $path = $request->file('file')->store('dcg', 'local');

        if (! is_string($path)) {
            throw new RuntimeException('The DCG upload could not be stored.');
        }

        return $path;
    }
}
