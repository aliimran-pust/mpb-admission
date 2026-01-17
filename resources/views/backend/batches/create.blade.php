@extends('backend.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item">Batch List</li>
                    <li class="breadcrumb-item active">Add Batch</li>
                </ol>
            </div>
            <div class="col-md-6">
                <a class="btn btn-info btn-xs float-right" href="{{ route('batches.index') }}"><< Go Back</a>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header bg-gradient-info">
        <h3 class="card-title"><i class="fa fa-plus-circle"></i> Add Batch</h3>
    </div>

    <form method="POST" action="{{ route('batches.store') }}">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="form-control @error('title') is-invalid @enderror" required>
                @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Year <span class="text-danger">*</span></label>
                <input type="number" name="year" value="{{ old('year') }}"
                       class="form-control @error('year') is-invalid @enderror" required>
                @error('year')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-warning"><i class="fa fa-save"></i> Save</button>
            <a href="{{ route('batches.index') }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>
</div>
</section>
@endsection
