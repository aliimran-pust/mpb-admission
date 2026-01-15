<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

use Illuminate\Support\Facades\Schema;
use App\Models\Department; // Assuming table is departments
use App\Models\Program;    // Assuming table is programs

class CourseController extends Controller
{
    // List Courses
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        return view('backend.courses.index', compact('courses'));
    }

    // Show Add Course form
    public function create()
    {
       // $departments = Department::orderBy('name')->get();
       // $programs = Program::orderBy('name')->get();

       // Check if departments table exists
        if (Schema::hasTable('departments')) {
            $departments = Department::orderBy('name')->get();
        } else {
            // $departments = collect(); // empty collection
            $departments = collect([
                (object)[ 'id' => 0, 'name' => 'Department of Banking and Insurance' ]
            ]);
        }

        // Check if programs table exists
        if (Schema::hasTable('programs')) {
            $programs = Program::orderBy('name')->get();
        } else {
            // $programs = collect(); // empty collection
            $programs = collect([
                (object)[ 'id' => 0, 'name' => 'Professional Masters in Banking and Insurance' ]
            ]);
        }
       return view('backend.courses.create', compact('departments', 'programs'));
    }

    // Store Course
    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id' => 'required|integer',
            'program_id'    => 'required|integer',
            'course_name'   => 'required|string|max:300',
            'course_type'   => 'nullable|integer',
            'course_prefix' => 'nullable|string|max:50',
            'course_code'   => 'nullable|string|max:10',
            'course_year'   => 'nullable|string|max:100',
            'course_semester' => 'nullable|string|max:100',
            'course_credit' => 'nullable|numeric',
            'total_marks'   => 'nullable|integer',
            'course_outline'=> 'nullable|string',
        ]);

        $validated['created_time'] = now();
        $validated['created_ip']   = request()->ip();

        Course::create($validated);

        return redirect()->route('courses.index')->with('message', 'Course added successfully!');
    }

    // 4️⃣ Show Edit Form
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        // $departments = Department::orderBy('name')->get();
        // $programs = Program::orderBy('name')->get();

        // Check if departments table exists
        if (Schema::hasTable('departments')) {
            $departments = Department::orderBy('name')->get();
        } else {
            // $departments = collect(); // empty collection
            $departments = collect([
                (object)[ 'id' => 0, 'name' => 'Department of Banking and Insurance' ]
            ]);
        }

        // Check if programs table exists
        if (Schema::hasTable('programs')) {
            $programs = Program::orderBy('name')->get();
        } else {
            // $programs = collect(); // empty collection
            $programs = collect([
                (object)[ 'id' => 0, 'name' => 'Professional Masters in Banking and Insurance' ]
            ]);
        }
        
        return view('backend.courses.edit', compact('course', 'departments', 'programs'));
    }

    // 5️⃣ Update Course
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'department_id' => 'required|integer',
            'program_id'    => 'required|integer',
            'course_name'   => 'required|string|max:300',
            'course_type'   => 'nullable|integer',
            'course_prefix' => 'nullable|string|max:50',
            'course_code'   => 'nullable|string|max:10',
            'course_year'   => 'nullable|string|max:100',
            'course_semester' => 'nullable|string|max:100',
            'course_credit' => 'nullable|numeric',
            'total_marks'   => 'nullable|integer',
            'course_outline'=> 'nullable|string',
        ]);

        $validated['updated_time'] = now();
        $validated['updated_ip']   = request()->ip();

        $course->update($validated);

        return redirect()->route('courses.index')->with('message', 'Course updated successfully!');
    }

    // 6️⃣ Delete Course
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('message', 'Course deleted successfully!');
    }
}
