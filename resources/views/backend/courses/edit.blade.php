@extends('backend.layout')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Courses</li>
            <li class="breadcrumb-item active">Edit Course</li>
        </ol>
        <a href="{{ route('courses.index') }}" class="btn btn-info btn-xs float-right"><< Go Back</a>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-gradient-warning">
                <h3 class="card-title"><i class="fa fa-edit"></i> Edit Course</h3>
            </div>

            <form method="POST" action="{{ route('courses.update', $course->id) }}">
                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- Department --}}
                    <div class="form-group">
                        <label>Department <span class="text-danger">*</span></label>
                        <select name="department_id" class="form-control select2" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id', $course->department_id) == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Program --}}
                    <div class="form-group">
                        <label>Program <span class="text-danger">*</span></label>
                        <select name="program_id" class="form-control select2" required>
                            <option value="">Select Program</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{ old('program_id', $course->program_id) == $program->id ? 'selected' : '' }}>
                                    {{ $program->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('program_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Course Name --}}
                    <div class="form-group">
                        <label>Course Name <span class="text-danger">*</span></label>
                        <input type="text" name="course_name" class="form-control" value="{{ old('course_name', $course->course_name) }}" required>
                        @error('course_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Course Code --}}
                    <div class="form-group">
                        <label>Course Code</label>
                        <input type="text" name="course_code" class="form-control" value="{{ old('course_code', $course->course_code) }}">
                    </div>

                    {{-- Course Prefix --}}
                    <div class="form-group">
                        <label>Course Prefix</label>
                        <input type="text" name="course_prefix" class="form-control" value="{{ old('course_prefix', $course->course_prefix) }}">
                    </div>

                    {{-- Course Type --}}
                    <div class="form-group">
                        <label>Course Type</label>
                        <input type="number" name="course_type" class="form-control" value="{{ old('course_type', $course->course_type) }}">
                    </div>

                    {{-- Course Year --}}
                    <div class="form-group">
                        <label>Course Year</label>
                        <input type="text" name="course_year" class="form-control" value="{{ old('course_year', $course->course_year) }}">
                    </div>

                    {{-- Course Semester --}}
                    <div class="form-group">
                        <label>Course Semester</label>
                        <input type="text" name="course_semester" class="form-control" value="{{ old('course_semester', $course->course_semester) }}">
                    </div>

                    {{-- Course Credit --}}
                    <div class="form-group">
                        <label>Course Credit</label>
                        <input type="number" step="0.1" name="course_credit" class="form-control" value="{{ old('course_credit', $course->course_credit) }}">
                    </div>

                    {{-- Total Marks --}}
                    <div class="form-group">
                        <label>Total Marks</label>
                        <input type="number" name="total_marks" class="form-control" value="{{ old('total_marks', $course->total_marks) }}">
                    </div>

                    {{-- Course Outline --}}
                    <div class="form-group">
                        <label>Course Outline</label>
                        <textarea name="course_outline" class="form-control">{{ old('course_outline', $course->course_outline) }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ old('is_active', $course->is_active)==1 ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('is_active', $course->is_active)==2 ? 'selected' : '' }}>Inactive</option>
                            <option value="0" {{ old('is_active', $course->is_active)==0 ? 'selected' : '' }}>Deleted</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-default float-right">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
            placeholder: "Select an option",
            allowClear: true
        });
    });
</script>
@endpush
