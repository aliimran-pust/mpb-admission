<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourseOffer;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseOfferController extends Controller
{
    public function index()
    {
        $courseOffers = CourseOffer::with([
            'semester',
            'course',
            'section',
            'teacher'
        ])->latest()->get();

        return view('backend.course_offers.index', compact('courseOffers'));
    }

    public function create()
    {
        $semesters = Semester::all();
        $courses   = Course::all();
        $sections  = Section::all();
        $teachers  = Teacher::all();

        return view('backend.course_offers.create', compact(
            'semesters', 'courses', 'sections', 'teachers'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester_id' => 'required',
            'course_id'   => 'required',
            'section_id'  => 'required',
            'teacher_id'  => 'required',
            'offer_type'  => 'required',
            'status'      => 'required'
        ]);

        CourseOffer::create($request->all());

        return redirect()
            ->route('course-offers.index')
            ->with('message', 'Course Offer Created Successfully');
    }
    
    public function edit($id)
    {
        $courseOffer = CourseOffer::findOrFail($id);

        $semesters = Semester::all();
        $courses   = Course::all();
        $sections  = Section::all();
        $teachers  = Teacher::all();

        return view('backend.course_offers.edit', compact(
            'courseOffer', 'semesters', 'courses', 'sections', 'teachers'
        ));
    }

    public function update(Request $request, $id)
    {
        $courseOffer = CourseOffer::findOrFail($id);

        $courseOffer->update($request->all());

        return redirect()
            ->route('course-offers.index')
            ->with('message', 'Course Offer Updated Successfully');
    }

    public function destroy($id)
    {
        CourseOffer::findOrFail($id)->delete();

        return redirect()
            ->route('course-offers.index')
            ->with('message', 'Course Offer Deleted Successfully');
    }
}
