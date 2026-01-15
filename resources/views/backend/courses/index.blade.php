@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Courses</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
        <a href="{{ route('courses.create') }}" class="btn btn-success btn-xs float-right">
            + Add Course
        </a>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Course List</h3>
            </div>

            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Credit</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_type }}</td>
                            <td>{{ $course->course_credit }}</td>
                            <td>{{ $course->course_year }}</td>
                            <td>{{ $course->course_semester }}</td>
                            <td>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-xs btn-info">Edit</a>

                                <!-- Delete Modal Trigger -->
                                <button type="button" class="btn btn-xs btn-danger"
                                        data-toggle="modal" data-target="#deleteModal{{ $course->id }}">
                                    Delete
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $course->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="deleteModalLabel{{ $course->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="POST" action="{{ route('courses.destroy', $course->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $course->id }}">
                                                        Confirm Delete
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete course
                                                    <strong>{{ $course->course_name }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Yes, Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No Courses Found!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
