@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Fees</li>
            <li class="breadcrumb-item active">Edit Fee Category</li>
        </ol>
        <a href="{{ route('fee-categories.index') }}"
           class="btn btn-info btn-xs float-right"><< Go Back</a>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header bg-gradient-info">
        <h3 class="card-title"><i class="fa fa-edit"></i> Edit Fee Category</h3>
    </div>

    <form method="POST" action="{{ route('fee-categories.update',$fee_category->id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" name="name"
                       value="{{ old('name',$fee_category->name) }}"
                       class="form-control @error('name') is-invalid @enderror" required>
                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control">
                    <option value="admission" {{ $fee_category->type=='admission'?'selected':'' }}>Admission</option>
                    <option value="semester" {{ $fee_category->type=='semester'?'selected':'' }}>Semester</option>
                    <option value="retake" {{ $fee_category->type=='retake'?'selected':'' }}>Retake</option>
                    <option value="other" {{ $fee_category->type=='other'?'selected':'' }}>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $fee_category->status=='active'?'selected':'' }}>Active</option>
                    <option value="inactive" {{ $fee_category->status=='inactive'?'selected':'' }}>Inactive</option>
                </select>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
            <a href="{{ route('fee-categories.index') }}"
               class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>
</div>
</section>
@endsection
