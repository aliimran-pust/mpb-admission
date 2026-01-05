@extends('backend.layout')

@push('css')
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pending Member List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Pending Member List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-list"></i> Pending Member List
                            </h3>
                        </div> <!-- /.card-header -->

                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ request()->session()->pull('message') }}
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ request()->session()->pull('error') }}
                                </div>
                            @endif


                                <div class="card-body">
                                    <table id="dataTbl" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Membership Type</th>
                                            <th>CSE Ref. No</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($candidates as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->membership_type }}</td>
                                                <td>{{ $item->csc_ref }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <span class="badge badge-warning">{{ $item->application_status }} </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('view_details_member', $item->id) }}"
                                                       class="btn btn-xs btn-success"><span class="fa fa-eye-slash"></span>
                                                        View Details </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.card-body -->

                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            // data-tables
            $('#dataTbl').DataTable({
                "order": [[0, "desc"]]
            });
        } );
    </script>
@endpush
