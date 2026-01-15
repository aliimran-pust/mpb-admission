@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Teachers</li>
            <li class="breadcrumb-item active">Teacher List</li>
        </ol>
        <a href="{{ route('teachers.create') }}" class="btn btn-success btn-xs float-right"><i class="fa fa-plus"></i> Add Teacher</a>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header bg-gradient-primary">
                <h3 class="card-title"><i class="fa fa-list"></i> All Teachers</h3>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>View Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $index => $teacher)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td>{{ $teacher->designation }}</td>
                            <td>{{ $teacher->status ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $teacher->view_order }}</td>
                            <td>
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are You Sure to Delete this Teacher from the List?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($teachers->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">No Teacher Assigned!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
@endsection
