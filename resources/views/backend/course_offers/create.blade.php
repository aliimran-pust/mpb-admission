@extends('backend.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item">Course Offer List</li>
                    <li class="breadcrumb-item active">Add Course Offer</li>
                </ol>
            </div>
            <div class="col-md-6">
                <a class="btn btn-info btn-xs float-right"
                   href="{{ route('course-offers.index') }}">
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
            <i class="fa fa-plus-circle"></i> Add Course Offer
        </h3>
    </div>

    <form method="POST" action="{{ route('course-offers.store') }}">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Semester <span class="text-danger">*</span></label>
                <select name="semester_id" class="form-control" required>
                    <option value="" selected disabled>Select Semester</option>
                    @foreach($semesters as $s)
                        <option value="{{ $s->id }}">
                            {{ $s->semesterName }} {{ $s->semesterYear }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Course <span class="text-danger">*</span></label>
                <select name="course_id" class="form-control" required>
                    <option value="" selected disabled>Select Course</option>
                    @foreach($courses as $c)
                        <option value="{{ $c->id }}">
                            {{ $c->course_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Section <span class="text-danger">*</span></label>
                <select name="section_id" class="form-control" required>
                    <option value="" selected disabled>Select Section</option>
                    @foreach($sections as $sec)
                        <option value="{{ $sec->id }}">
                            {{ $sec->section_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Teacher <span class="text-danger">*</span></label>
                <select name="teacher_id" class="form-control" required>
                    <option value="" selected disabled>Select Teacher</option>
                    @foreach($teachers as $t)
                        <option value="{{ $t->id }}">
                            {{ $t->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Class Room</label>
                <input type="text" name="class_room"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Class Days</label>
                <input type="text" name="class_days"
                       class="form-control"
                       placeholder="Sun, Tue">
            </div>

            <div class="form-group">
                <label>Class Time</label>
                <input type="text" name="class_time"
                       class="form-control"
                       placeholder="10:00 - 11:30">
            </div>

            <div class="form-group">
                <label>Offer Type</label>
                <select name="offer_type" class="form-control">
                    <option value="Regular">Regular</option>
                    <option value="Retake">Retake</option>
                    <option value="Improvement">Improvement</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-warning">
                <i class="fa fa-save"></i> Save
            </button>
            <a href="{{ route('course-offers.index') }}"
               class="btn btn-default float-right">Cancel</a>
        </div>

    </form>
</div>

</div>
</section>
@endsection
