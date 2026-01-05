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
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Member</li>
                        <li class="breadcrumb-item active">Show</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                             Member Details
                            </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>ID</th>
                                    <td>:</td>
                                    <td>{{ $candidate->id }}</td>
                                    <th>Name</th>
                                    <td>:</td>
                                    <td>{{ $candidate->title }} {{ $candidate->full_name }}</td>
                                </tr>

                                <tr>
                                    <th>Address</th>
                                    <td>:</td>
                                    <td>{{ $candidate->address }}</td>
                                    <th>Mobile</th>
                                    <td>:</td>
                                    <td>{{ $candidate->mobile }}</td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{ $candidate->email }}</td>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{ $candidate->email }}</td>
                                </tr>

                                <tr>
                                    <th>Occupation</th>
                                    <td>:</td>
                                    <td>{{ $candidate->occupation }}</td>
                                    <th>Specialization</th>
                                    <td>:</td>
                                    <td>{{ $candidate->specialization }}</td>

                                <tr>
                                    <th>Membership Type</th>
                                    <td>:</td>
                                    <td>{{ $candidate->membership_type }}</td>
                                    <th>Award Years</th>
                                    <td>:</td>
                                    <td>{{ $candidate->award_years }}</td>
                                </tr>

                                <tr>
                                    <th>Award Type</th>
                                    <td>:</td>
                                    <td>{{ $candidate->award_type }}</td>
                                    <th>CSC Ref. No</th>
                                    <td>:</td>
                                    <td>{{ $candidate->csc_ref }}</td>
                                </tr>

                                <tr>
                                    <th>Host Institution</th>
                                    <td>:</td>
                                    <td>{{ $candidate->host_institution }}</td>
                                    <th>Academic Program</th>
                                    <td>:</td>
                                    <td>{{ $candidate->academic_program }}</td>
                                </tr>

                                <tr>
                                    <th>Created At</th>
                                    <td>:</td>
                                    <td>{{ $candidate->created_at }}</td>
                                    <th>Transaction ID</th>
                                    <td>:</td>
                                    <td>{{ $candidate->transaction_id ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>
                                        <span class="badge badge-warning">{{ $candidate->application_status }} </span>
                                    </td>
                                    <th>Payment Receipt Copy</th>
                                    <td>:</td>
                                    <td>
                                        @if($candidate->payment_receipt_copy)
                                            <a href="{{ asset('storage/' . $candidate->payment_receipt_copy) }}"
                                               target="_blank" class="btn btn-sm btn-primary">
                                                <i class="fas fa-file-download mr-1"></i> View Receipt
                                            </a>
                                        @else
                                            <span class="text-muted">No receipt</span>
                                        @endif
                                    </td>
                                </tr>

                            </table>

                            @if($candidate->application_status === 'Pending')
                                <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#approveModal">
                                    <i class="fas fa-check"></i> Approve Membership
                                </button>
                            @else
                                <div class="mt-5">
                                    <span class="badge badge-success p-2">
                                        <i class="fas fa-check-circle"></i> Approved on {{ $candidate->updated_at->format('M d, Y') }}
                                    </span>
                                </div>
                            @endif

                            <!-- Approval Confirmation Modal -->
                            <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success text-white">
                                            <h5 class="modal-title" id="approveModalLabel">Confirm Approval</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to approve <strong>{{ $candidate->full_name }}</strong>'s membership?</p>
                                            <p><strong>Email:</strong> {{ $candidate->email }}</p>
                                            <p><strong>Application Date:</strong> {{ $candidate->created_at->format('M d, Y') }}</p>

                                            @if($candidate->payment_receipt_copy)
                                                <p class="mt-3">
                                                    <a href="{{ asset('storage/'.$candidate->payment_receipt_copy) }}"
                                                       target="_blank" class="btn btn-sm btn-info">
                                                        <i class="fas fa-file-download"></i> View Payment Receipt
                                                    </a>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('members.approve') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="membership_id" value="{{$candidate->id ?? ''}}">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-check"></i> Confirm Approval
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



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
@endpush
