@extends('backend.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h1>Edit Course Offer</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('course-offers.index') }}"
                   class="btn btn-primary btn-xs float-right">
                    << Go Back
                </a>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card">
    <div class="card-header bg-gradient-info">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Course Offer
        </h3>
    </div>

    <form method="POST"
          action="{{ route('course-offers.update', $courseOffer->id) }}">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label>Semester</label>
                <input type="text"
                       class="form-control"
                       value="{{ $courseOffer->semester->semesterName }} {{ $courseOffer->semester->semesterYear }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Course</label>
                <input type="text"
                       class="form-control"
                       value="{{ $courseOffer->course->course_name }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Section</label>
                <input type="text"
                       class="form-control"
                       value="{{ $courseOffer->section->section_name }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Teacher</label>
                <input type="text"
                       class="form-control"
                       value="{{ $courseOffer->teacher->name }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Class Room</label>
                <input type="text" name="class_room"
                       value="{{ $courseOffer->class_room }}"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Class Days</label>
                <input type="text" name="class_days"
                       value="{{ $courseOffer->class_days }}"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Class Time</label>
                <input type="text" name="class_time"
                       value="{{ $courseOffer->class_time }}"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Offer Type</label>
                <select name="offer_type" class="form-control">
                    <option value="Regular" @selected($courseOffer->offer_type=='Regular')>Regular</option>
                    <option value="Retake" @selected($courseOffer->offer_type=='Retake')>Retake</option>
                    <option value="Improvement" @selected($courseOffer->offer_type=='Improvement')>Improvement</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Open" @selected($courseOffer->status=='Open')>Open</option>
                    <option value="Closed" @selected($courseOffer->status=='Closed')>Closed</option>
                    <option value="Cancelled" @selected($courseOffer->status=='Cancelled')>Cancelled</option>
                </select>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-warning">
                <i class="fa fa-save"></i> Update
            </button>
            <a href="{{ route('course-offers.index') }}"
               class="btn btn-default float-right">Cancel</a>
        </div>

    </form>
</div>

</div>
</section>
@endsection
