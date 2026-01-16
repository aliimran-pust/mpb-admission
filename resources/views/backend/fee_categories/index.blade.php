@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Fees</li>
            <li class="breadcrumb-item active">Fee Categories</li>
        </ol>
        <a href="{{ route('fee-categories.create') }}"
           class="btn btn-success btn-xs float-right">
            <i class="fa fa-plus"></i> Add Fee Category
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
        <h3 class="card-title"><i class="fa fa-list"></i> Fee Category List</h3>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <span class="badge badge-info">
                            {{ ucfirst($category->type) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-{{ $category->status=='active'?'success':'secondary' }}">
                            {{ ucfirst($category->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('fee-categories.edit',$category->id) }}"
                           class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('fee-categories.destroy',$category->id) }}"
                              method="POST" style="display:inline;"
                              onsubmit="return confirm('Are You Sure to Delete This Category?')">
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
                    <td colspan="5" class="text-center">No Fee Category Found!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
</section>
@endsection
