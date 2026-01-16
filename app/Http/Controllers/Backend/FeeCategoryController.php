<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function index()
    {
        $categories = FeeCategory::orderBy('id', 'desc')->get();
        return view('backend.fee_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.fee_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'type'   => 'required|in:admission,semester,retake,other',
            'status' => 'required|in:active,inactive',
        ]);

        FeeCategory::create($validated);

        return redirect()
            ->route('fee-categories.index')
            ->with('message', 'Fee category created successfully.');
    }

    public function edit(FeeCategory $fee_category)
    {
        return view('backend.fee_categories.edit', compact('fee_category'));
    }

    public function update(Request $request, FeeCategory $fee_category)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'type'   => 'required|in:admission,semester,retake,other',
            'status' => 'required|in:active,inactive',
        ]);

        $fee_category->update($validated);

        return redirect()
            ->route('fee-categories.index')
            ->with('message', 'Fee category updated successfully.');
    }

    public function destroy(FeeCategory $fee_category)
    {
        $fee_category->delete();

        return redirect()
            ->route('fee-categories.index')
            ->with('message', 'Fee category deleted successfully.');
    }
}
