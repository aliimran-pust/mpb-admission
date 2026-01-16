@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Batch</li>
            <li class="breadcrumb-item active">Batch List</li>
        </ol>
        <a href="{{ route('batches.create') }}" class="btn btn-success btn-xs float-right">
            <i class="fa fa-plus"></i> Add Batch
        </a>
    </div>
</div>

<section class="content">
<div class="container-fluid">
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card">
        <div class="card-header bg-gradient-primary">
            <h3 class="card-title"><i class="fa fa-list"></i> Batch List</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($batches as $batch)
                        <tr>
                            <td>{{ $batch->id }}</td>
                            <td>{{ $batch->title }}</td>
                            <td>{{ $batch->year }}</td>
                            <td>
                                <span class="badge badge-{{ $batch->status=='active'?'success':'secondary' }}">
                                    {{ ucfirst($batch->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('batches.edit',$batch->id) }}" class="btn btn-warning btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('batches.destroy',$batch->id) }}"
                                      method="POST" style="display:inline;"
                                      onsubmit="return confirm('Delete This Batch?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Batch Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
@endsection
