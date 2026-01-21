@extends('backend.layout')

@section('content')

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="{{ route('course-offers.create') }}"
                   class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Course Offer
                </a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Course Offers</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">Course Offer List</h3>
    </div>

    <div class="card-body">

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Teacher</th>
                    <th>Status</th>
                    <th width="120">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($courseOffers as $row)
                <tr>
                    <td>{{ $row->semester->semesterName ?? '-' }}</td>
                    <td>{{ $row->course->course_name ?? '-' }}</td>
                    <td>{{ $row->section->section_name ?? '-' }}</td>
                    <td>{{ $row->teacher->name ?? '-' }}</td>
                    <td>{{ $row->status }}</td>
                    <td>
                        <a href="{{ route('course-offers.edit', $row->id) }}"
                           class="btn btn-warning btn-xs">Edit</a>

                        <form action="{{ route('course-offers.destroy', $row->id) }}"
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
                    <td colspan="6" class="text-center">
                        No Course Offer Found!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

</div>
</section>
@endsection
