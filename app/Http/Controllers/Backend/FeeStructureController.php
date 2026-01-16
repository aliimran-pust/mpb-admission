<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeeStructure;
use App\Models\Batch;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    public function index()
    {
        $feeStructures = FeeStructure::with(['batch', 'feeCategory'])
            ->orderBy('effective_date', 'desc')
            ->get();

        return view('backend.fee_structures.index', compact('feeStructures'));
    }

    public function create()
    {
        $batches = Batch::orderBy('year', 'desc')->get();
        $categories = FeeCategory::where('status', 'active')->get();

        return view('backend.fee_structures.create', compact('batches', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'fee_category_id' => 'required|exists:fee_categories,id',
            'student_type' => 'required|in:general,corporate',
            'amount' => 'required|numeric|min:0',
            'effective_date' => 'required|date',
        ]);

        FeeStructure::create($validated);

        return redirect()
            ->route('fee-structures.index')
            ->with('message', 'Fee structure added successfully');
    }

    public function edit(FeeStructure $feeStructure)
    {
        $batches = Batch::orderBy('year', 'desc')->get();
        $categories = FeeCategory::where('status', 'active')->get();

        return view('backend.fee_structures.edit', compact(
            'feeStructure',
            'batches',
            'categories'
        ));
    }

    public function update(Request $request, FeeStructure $feeStructure)
    {
        $validated = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'fee_category_id' => 'required|exists:fee_categories,id',
            'student_type' => 'required|in:general,corporate',
            'amount' => 'required|numeric|min:0',
            'effective_date' => 'required|date',
        ]);

        $feeStructure->update($validated);

        return redirect()
            ->route('fee-structures.index')
            ->with('message', 'Fee structure updated successfully');
    }

    public function destroy(FeeStructure $feeStructure)
    {
        $feeStructure->delete();

        return redirect()
            ->route('fee-structures.index')
            ->with('message', 'Fee structure deleted successfully');
    }
}
