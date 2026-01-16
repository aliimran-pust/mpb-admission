@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Fees</li>
            <li class="breadcrumb-item active">Add Fee Structure</li>
        </ol>
        <a href="{{ route('fee-structures.index') }}"
           class="btn btn-info btn-xs float-right"><< Go Back</a>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header bg-gradient-info">
        <h3 class="card-title"><i class="fa fa-plus-circle"></i> Add Fee Structure</h3>
    </div>

    <form method="POST" action="{{ route('fee-structures.store') }}">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label>Batch <span class="text-danger">*</span></label>
                <select name="batch_id" class="form-control" required>
                    <option value="">Select Batch</option>
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}">{{ $batch->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Fee Category <span class="text-danger">*</span></label>
                <select name="fee_category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Student Type <span class="text-danger">*</span></label>
                <select name="student_type" class="form-control" required>
                    <option value="general">General</option>
                    <option value="corporate">Corporate</option>
                </select>
            </div>

            <div class="form-group">
                <label>Amount <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="amount"
                       class="form-control" required>
            </div>

            <div class="form-group">
                <label>Effective Date <span class="text-danger">*</span></label>
                <input type="date" name="effective_date"
                       class="form-control" required>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-warning"><i class="fa fa-save"></i> Save</button>
            <a href="{{ route('fee-structures.index') }}"
               class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>
</div>
</section>
@endsection
