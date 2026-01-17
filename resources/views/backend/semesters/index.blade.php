@extends('backend.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('semesters.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i> Add Semester</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Semester</li>
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
                <h3 class="card-title">Semester List</h3>
            </div>

            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-primary">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Application Start</th>
                            <th>Application End</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($semesters as $semester)
                        <tr>
                            <td>{{ $semester->semesterCode }}</td>
                            <td>{{ $semester->semesterName }}</td>
                            <td>{{ $semester->semesterYear }}</td>
                            <td>{{ $semester->applicationStart }}</td>
                            <td>{{ $semester->applicationEnd }}</td>
                            <td>
                                <a href="{{ route('semesters.edit', $semester->id) }}" class="btn btn-xs btn-warning">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <button type="button" class="btn btn-xs btn-danger"
                                        data-toggle="modal" data-target="#deleteModal{{ $semester->id }}">
                                    Delete
                                </button>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal{{ $semester->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="deleteModalLabel{{ $semester->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="POST" action="{{ route('semesters.destroy', $semester->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $semester->id }}">
                                                        Confirm Delete
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete semester
                                                    <strong>{{ $semester->semesterName }} {{ $semester->semesterYear }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Yes, Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No Semester Found!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
