<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::orderBy('year', 'desc')->get();
        return view('backend.batches.index', compact('batches'));
    }

    public function create()
    {
        return view('backend.batches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:100',
            'year'   => 'required|digits:4',
            'status' => 'required|in:active,inactive',
        ]);

        Batch::create($validated);

        return redirect()
            ->route('batches.index')
            ->with('message', 'Batch created successfully.');
    }

    public function edit(Batch $batch)
    {
        return view('backend.batches.edit', compact('batch'));
    }

    public function update(Request $request, Batch $batch)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:100',
            'year'   => 'required|digits:4',
            'status' => 'required|in:active,inactive',
        ]);

        $batch->update($validated);

        return redirect()
            ->route('batches.index')
            ->with('message', 'Batch updated successfully.');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()
            ->route('batches.index')
            ->with('message', 'Batch deleted successfully.');
    }
}
