@extends('backend.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Edit Semester</h1>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('semesters.index') }}" class="btn btn-primary btn-xs float-right"><< Go Back</a>
                </div>
            </div>
        </div>
    </div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-gradient-warning">
                <h3 class="card-title"><i class="fa fa-edit"></i> Edit Semester</h3>
            </div>

            <form method="POST" action="{{ route('semesters.update', $semester->id) }}">
                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- Semester Code --}}
                    <div class="form-group">
                        <label>Semester Code <span class="text-danger">*</span></label>
                        <input type="text" name="semesterCode"
                               class="form-control @error('semesterCode') is-invalid @enderror"
                               value="{{ old('semesterCode', $semester->semesterCode) }}" placeholder="e.g. F24">
                        @error('semesterCode')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Semester Name --}}
                    <div class="form-group">
                        <label>Semester Name <span class="text-danger">*</span></label>
                        <select name="semesterName" class="form-control @error('semesterName') is-invalid @enderror">
                            <option value="">Select</option>
                            <option value="Fall" {{ old('semesterName', $semester->semesterName)=='Fall' ? 'selected' : '' }}>Fall</option>
                            <option value="Spring" {{ old('semesterName', $semester->semesterName)=='Spring' ? 'selected' : '' }}>Spring</option>
                            <option value="Summer" {{ old('semesterName', $semester->semesterName)=='Summer' ? 'selected' : '' }}>Summer</option>
                        </select>
                        @error('semesterName')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Semester Year --}}
                    <div class="form-group">
                        <label>Semester Year <span class="text-danger">*</span></label>
                        <input type="number" name="semesterYear"
                               class="form-control @error('semesterYear') is-invalid @enderror"
                               value="{{ old('semesterYear', $semester->semesterYear) }}" placeholder="2025">
                        @error('semesterYear')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Special Note --}}
                    <div class="form-group">
                        <label>Special Note</label>
                        <input type="text" name="specialNote"
                               class="form-control @error('specialNote') is-invalid @enderror"
                               value="{{ old('specialNote', $semester->specialNote) }}">
                        @error('specialNote')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Application Start --}}
                    <div class="form-group">
                        <label>Application Start Date</label>
                        <input type="date" name="applicationStart"
                               class="form-control @error('applicationStart') is-invalid @enderror"
                               value="{{ old('applicationStart', $semester->applicationStart) }}">
                        @error('applicationStart')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Application End --}}
                    <div class="form-group">
                        <label>Application End Date</label>
                        <input type="date" name="applicationEnd"
                               class="form-control @error('applicationEnd') is-invalid @enderror"
                               value="{{ old('applicationEnd', $semester->applicationEnd) }}">
                        @error('applicationEnd')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-save"></i> Update
                    </button>
                    <a href="{{ route('semesters.index') }}" class="btn btn-default float-right">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
