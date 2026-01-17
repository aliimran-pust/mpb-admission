@extends('backend.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Edit Fee Structure</h1>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('fee-structures.index') }}" class="btn btn-primary btn-xs float-right"><< Go Back</a>
                </div>
            </div>
        </div>
    </div>




<section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header bg-gradient-info">
        <h3 class="card-title"><i class="fa fa-edit"></i> Edit Fee Structure</h3>
    </div>

    <form method="POST" action="{{ route('fee-structures.update',$feeStructure->id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label>Batch</label>
                <select name="batch_id" class="form-control" required>
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}"
                            @selected($batch->id == $feeStructure->batch_id)>
                            {{ $batch->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Fee Category</label>
                <select name="fee_category_id" class="form-control" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            @selected($cat->id == $feeStructure->fee_category_id)>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Student Type</label>
                <select name="student_type" class="form-control">
                    <option value="general" @selected($feeStructure->student_type=='general')>General</option>
                    <option value="corporate" @selected($feeStructure->student_type=='corporate')>Corporate</option>
                </select>
            </div>

            <div class="form-group">
                <label>Amount</label>
                <input type="number" step="0.01"
                       name="amount"
                       value="{{ $feeStructure->amount }}"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Effective Date</label>
                <input type="date"
                       name="effective_date"
                       value="{{ $feeStructure->effective_date }}"
                       class="form-control">
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
            <a href="{{ route('fee-structures.index') }}"
               class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>
</div>
</section>
@endsection
