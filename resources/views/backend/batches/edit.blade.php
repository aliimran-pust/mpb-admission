@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Batch</li>
            <li class="breadcrumb-item active">Edit Batch</li>
        </ol>
        <a class="btn btn-info btn-xs float-right" href="{{ route('batches.index') }}"><< Go Back</a>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header bg-gradient-info">
        <h3 class="card-title"><i class="fa fa-edit"></i> Edit Batch</h3>
    </div>

    <form method="POST" action="{{ route('batches.update',$batch->id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" name="title"
                       value="{{ old('title',$batch->title) }}"
                       class="form-control @error('title') is-invalid @enderror" required>
                @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Year <span class="text-danger">*</span></label>
                <input type="number" name="year"
                       value="{{ old('year',$batch->year) }}"
                       class="form-control @error('year') is-invalid @enderror" required>
                @error('year')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $batch->status=='active'?'selected':'' }}>Active</option>
                    <option value="inactive" {{ $batch->status=='inactive'?'selected':'' }}>Inactive</option>
                </select>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
            <a href="{{ route('batches.index') }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>
</div>
</section>
@endsection
