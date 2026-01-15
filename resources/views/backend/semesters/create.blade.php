@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Semester</li>
            <li class="breadcrumb-item active">Add Semester</li>
        </ol>
        <a class="btn btn-info btn-xs float-right" href="{{ route('semesters.index') }}">
            << Go Back
        </a>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header bg-gradient-info">
        <h3 class="card-title">
            <i class="fa fa-plus-circle"></i> Add Semester
        </h3>
    </div>

<form method="POST" action="{{ route('semesters.store') }}">
@csrf

<div class="card-body">

{{-- Semester Code --}}
<div class="form-group">
    <label>Semester Code <span class="text-danger">*</span></label>
    <input type="text" name="semesterCode"
           class="form-control @error('semesterCode') is-invalid @enderror"
           value="{{ old('semesterCode') }}" placeholder="e.g. F26">
    @error('semesterCode')<span class="invalid-feedback">{{ $message }}</span>@enderror
</div>

{{-- Semester Name --}}
<div class="form-group">
    <label>Semester Name <span class="text-danger">*</span></label>
    <select name="semesterName"
            class="form-control @error('semesterName') is-invalid @enderror">
        <option value="">Select</option>
        <option value="Fall">Fall</option>
        <option value="Spring">Spring</option>
        <option value="Summer">Summer</option>
    </select>
    @error('semesterName')<span class="invalid-feedback">{{ $message }}</span>@enderror
</div>

{{-- Semester Year --}}
<div class="form-group">
    <label>Semester Year <span class="text-danger">*</span></label>
    <input type="number" name="semesterYear"
           class="form-control @error('semesterYear') is-invalid @enderror"
           value="{{ old('semesterYear') }}" placeholder="2025">
    @error('semesterYear')<span class="invalid-feedback">{{ $message }}</span>@enderror
</div>

{{-- Special Note --}}
<div class="form-group">
    <label>Special Note</label>
    <input type="text" name="specialNote"
           class="form-control @error('specialNote') is-invalid @enderror"
           value="{{ old('specialNote') }}">
    @error('specialNote')<span class="invalid-feedback">{{ $message }}</span>@enderror
</div>

{{-- Application Start --}}
<div class="form-group">
    <label>Application Start Date</label>
    <input type="date" name="applicationStart"
           class="form-control @error('applicationStart') is-invalid @enderror"
           value="{{ old('applicationStart') }}">
    @error('applicationStart')<span class="invalid-feedback">{{ $message }}</span>@enderror
</div>

{{-- Application End --}}
<div class="form-group">
    <label>Application End Date</label>
    <input type="date" name="applicationEnd"
           class="form-control @error('applicationEnd') is-invalid @enderror"
           value="{{ old('applicationEnd') }}">
    @error('applicationEnd')<span class="invalid-feedback">{{ $message }}</span>@enderror
</div>

</div>

<div class="card-footer">
    <button class="btn btn-warning">
        <i class="fa fa-save"></i> Save
    </button>
</div>

</form>
</div>
</div>
</section>
@endsection
