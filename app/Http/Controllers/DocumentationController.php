<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index()
    {
        $documentations = Documentation::orderBy('created_at', 'asc')->get();
        return view('pages.documentation.index', compact('documentations'));
    }

    public function edit($id)
    {
        $documentation = Documentation::findOrFail($id);
        return view('pages.documentation.edit', compact('documentation'));
    }

    public function update(Request $request, $id)
    {
        try {
            $documentation = Documentation::findOrFail($id);

            $request->validate([
                'description' => 'nullable|string',
            ]);

            $documentation->update([
                'description' => $request->input('description'),
            ]);

            return redirect()->route('documentation.index', $id)
                ->with('success', 'Dokumentasi berhasil diperbarui.');
        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }
}
