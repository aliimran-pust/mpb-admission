@extends('backend.layout')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{route('fee-structures.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i> Add Fee Structure</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Fee Structures</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<section class="content">
    <div class="container-fluid">

<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">Fee Structures List</h3>
    </div>

    <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Batch</th>
                    <th>Category</th>
                    <th>Student Type</th>
                    <th>Amount</th>
                    <th>Effective Date</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($feeStructures as $row)
                <tr>
                    <td>{{ $row->batch->title ?? '-' }}</td>
                    <td>{{ $row->feeCategory->name ?? '-' }}</td>
                    <td>{{ ucfirst($row->student_type) }}</td>
                    <td>{{ number_format($row->amount, 2) }}</td>
                    <td>{{ $row->effective_date }}</td>
                    <td>
                        <a href="{{ route('fee-structures.edit', $row->id) }}"
                           class="btn btn-warning btn-xs">Edit</a>

                        <form action="{{ route('fee-structures.destroy', $row->id) }}"
                              method="POST"
                              style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-xs"
                                    onclick="return confirm('Delete this record?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No Fee Structure Found!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    </div>
</section>
@endsection
