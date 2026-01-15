<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        // Get all semesters ordered by year descending, then semester code
        $semesters = Semester::orderBy('semesterYear', 'desc')
                             ->orderBy('semesterCode', 'asc')
                             ->get();

        return view('backend.semesters.index', compact('semesters'));
    }

    public function create()
    {
        return view('backend.semesters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'semesterCode'      => 'required|string|max:3|unique:semesters,semesterCode',
            'semesterName'      => 'required|in:Fall,Spring,Summer',
            'semesterYear'      => 'required|integer|min:2000|max:2100',
            'specialNote'       => 'nullable|string|max:200',
            'applicationStart'  => 'required|date',
            'applicationEnd'    => 'required|date|after_or_equal:applicationStart',
        ]);

        Semester::create($validated);

        return redirect()
            ->route('semesters.index')
            ->with('message', 'Semester Added Successfully!');
    }

    // Show Edit Semester form
    public function edit($id)
    {
        $semester = Semester::findOrFail($id);
        return view('backend.semesters.edit', compact('semester'));
    }

    // Update Semester
    public function update(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);

        $validated = $request->validate([
            'semesterCode'      => 'required|string|max:3|unique:semesters,semesterCode,' . $semester->id,
            'semesterName'      => 'required|in:Fall,Spring,Summer',
            'semesterYear'      => 'required|integer|min:2000|max:2100',
            'specialNote'       => 'nullable|string|max:200',
            'applicationStart'  => 'required|date',
            'applicationEnd'    => 'required|date|after_or_equal:applicationStart',
        ]);

        $semester->update($validated);

        return redirect()->route('semesters.index')
                         ->with('message', 'Semester Updated Successfully!');
    }

    // Delete Semester
    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        return redirect()->route('semesters.index')
                         ->with('message', 'Semester Deleted Successfully!');
    }
}
