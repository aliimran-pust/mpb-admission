@extends('backend.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">Fee Category List</li>
                        <li class="breadcrumb-item active">Add Fee Category</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-info btn-xs float-right" href="{{ route('fee-categories.index') }}"><< Go Back</a>
                </div>
            </div>
        </div>
    </div>

<section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header bg-gradient-info">
        <h3 class="card-title"><i class="fa fa-plus-circle"></i> Add Fee Category</h3>
    </div>

    <form method="POST" action="{{ route('fee-categories.store') }}">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror" required>
                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Type <span class="text-danger">*</span></label>
                <select name="type" class="form-control">
                    <option value="admission">Admission</option>
                    <option value="semester">Semester</option>
                    <option value="retake">Retake</option>
                    <option value="other">Other</option>
                </select>
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
            <a href="{{ route('fee-categories.index') }}"
               class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>
</div>
</section>
@endsection
