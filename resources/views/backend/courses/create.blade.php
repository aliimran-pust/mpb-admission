@extends('backend.layout')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">Course List</li>
                        <li class="breadcrumb-item active">Add Course</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-info btn-xs float-right" href="{{ route('courses.index') }}"><< Go Back</a>
                </div>
            </div>
        </div>
    </div>



<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-gradient-success">
                <h3 class="card-title"><i class="fa fa-plus-circle"></i> Add Course</h3>
            </div>

            <form method="POST" action="{{ route('courses.store') }}">
                @csrf
                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ request()->session()->pull('message') }}
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ request()->session()->pull('error') }}
                        </div>
                    @endif

                    {{-- Department --}}
                    <div class="form-group">
                        <label>Department <span class="text-danger">*</span></label>
                        <select name="department_id" class="form-control select2" required>
                            <option value="" disabled>Select Department</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
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
                            <option value="" disabled>Select Program</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
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
                        <input type="text" name="course_name" class="form-control" value="{{ old('course_name') }}" required>
                        @error('course_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Course Code --}}
                    <div class="form-group">
                        <label>Course Code <span class="text-danger">*</span></label>
                        <input type="text" name="course_code" class="form-control" value="{{ old('course_code') }}" required>
                    </div>

                    {{-- Course Prefix --}}
                    <div class="form-group">
                        <label>Course Prefix</label>
                        <input type="text" name="course_prefix" class="form-control" value="{{ old('course_prefix') }}">
                    </div>

                    {{-- Course Type --}}
                    <div class="form-group">
                        <label>Course Type <span class="text-danger">*</span></label>
                        <input type="number" name="course_type" class="form-control" value="{{ old('course_type') }}" required>
                    </div>

                    {{-- Course Year --}}
                    <div class="form-group">
                        <label>Course Year <span class="text-danger">*</span></label>
                        <input type="text" name="course_year" class="form-control" value="{{ old('course_year') }}" required>
                    </div>

                    {{-- Course Semester --}}
                    <div class="form-group">
                        <label>Course Semester</label>
                        <input type="text" name="course_semester" class="form-control" value="{{ old('course_semester') }}">
                    </div>

                    {{-- Course Credit --}}
                    <div class="form-group">
                        <label>Course Credit <span class="text-danger">*</span></label>
                        <input type="number" step="0.1" name="course_credit" class="form-control" value="{{ old('course_credit') }}" required>
                    </div>

                    {{-- Total Marks --}}
                    <div class="form-group">
                        <label>Total Marks</label>
                        <input type="number" name="total_marks" class="form-control" value="{{ old('total_marks') }}">
                    </div>

                    {{-- Course Outline --}}
                    <div class="form-group">
                        <label>Course Outline</label>
                        <textarea name="course_outline" class="form-control">{{ old('course_outline') }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ old('is_active', 1)==1 ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('is_active', 1)==2 ? 'selected' : '' }}>Inactive</option>
                            <option value="0" {{ old('is_active', 1)==0 ? 'selected' : '' }}>Deleted</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
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
