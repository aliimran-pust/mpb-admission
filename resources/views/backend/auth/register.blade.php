<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BACSAF Membership Application</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <style>
        .payment-card {
            height: 100%;
        }
        @media (max-width: 768px) {
            .form-container {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-2">
                        <a href="https://www.bacsaf-bd.org/"><img src="{{ asset('assets/backend/img/logo.jpg') }}" alt="BACSAF Logo"
                                                    class="img-fluid"> </a>
                    </div>
                    <div class="col-md-10 text-center">
                        <h1>Bangladesh Association of Commonwealth Scholars and Fellows (BACSAF)</h1>
                        <p class="mb-0">British Council Bangladesh</p>
                        <p>5 Fuller Road, Dhaka- 1000, Bangladesh</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Payment Information (Left Side) -->
                    <div class="col-md-4">
                        <div class="card card-secondary payment-card">
                            <div class="card-header">
                                <h3 class="card-title">Membership Fees Payment Information</h3>
                            </div>
                            <div class="card-body">
                                <h4><i class="fas fa-money-bill-wave mr-2"></i>Membership Fees</h4>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Life Membership</b> <span class="float-right">BDT 5,500</span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>General Membership</b> <span class="float-right">BDT 1,500</span>
                                    </li>
                                </ul>

                                <h4><i class="fas fa-university mr-2"></i>Payment Methods</h4>
                                <div class="payment-methods">
                                    <p><strong>Option 1:</strong> Cash payment to the Treasurer, BACSAF</p>
                                    <p><strong>Option 2:</strong> Bank deposit to:</p>
                                    <div class="bank-details bg-light p-3">
                                        <p class="mb-1"><strong>Account Name:</strong></p>
                                        <p class="mb-2">Bangladesh Association of Commonwealth Scholars and Fellows (BACSAF)</p>

                                        <p class="mb-1"><strong>A/C No:</strong></p>
                                        <p class="mb-2">0200013444516</p>

                                        <p class="mb-1"><strong>Bank:</strong></p>
                                        <p class="mb-2">Agrani Bank Ltd, Dhaka University Branch</p>
                                    </div>
                                </div>

                                <div class="contact-info mt-3">
                                    <h4><i class="fas fa-envelope mr-2"></i>Contact</h4>
                                    <p><i class="fas fa-at mr-2"></i> bacsafbd@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Membership Form (Right Side) -->
                    <div class="col-md-8 form-container">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">MEMBERSHIP APPLICATION FORM</h3>
                            </div>
                            <!-- /.card-header -->

                            {{-- Success Message --}}
                            @if (session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- form start -->
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <select name="title" class="form-control">
                                                    <option value="">Select</option>
                                                    <option>Mr.</option>
                                                    <option>Mrs.</option>
                                                    <option>Ms.</option>
                                                    <option>Dr.</option>
                                                    <option>Prof.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="full_name" placeholder="Full Name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact Address</label>
                                        <textarea class="form-control" rows="3" name="address" placeholder="Enter full address"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile No.</label>
                                                <input type="tel" class="form-control" name="mobile" placeholder="Mobile number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email address">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Current Occupation</label>
                                        <input type="text" class="form-control" name="occupation" placeholder="Current job/position">
                                    </div>

                                    <div class="form-group">
                                        <label>Field of Specialization</label>
                                        <input type="text" class="form-control" name="specialization" placeholder="Your field of expertise">
                                    </div>

                                    <div class="form-group">
                                        <label>Membership Type</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="membership_type" id="lifeMember" value="life">
                                            <label class="form-check-label" for="lifeMember">Life Member (BDT 5,500)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="membership_type" id="generalMember" value="general">
                                            <label class="form-check-label" for="generalMember">General Member (BDT 1,500)</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Year(s) of Commonwealth Award(s)</label>
                                        <input type="text" class="form-control" name="award_years" placeholder="Year(s) of award">
                                    </div>

                                    <div class="form-group">
                                        <label>Type of Award</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="award_type" id="scholarship" value="scholarship">
                                            <label class="form-check-label" for="scholarship">Scholarship</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="award_type" id="fellowship" value="fellowship">
                                            <label class="form-check-label" for="fellowship">Fellowship</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>CSC Ref. No.</label>
                                        <input type="text" class="form-control" name="csc_ref" placeholder="Commonwealth Scholarship Commission reference number">
                                    </div>

                                    <div class="form-group">
                                        <label>Name of Host Institution(s)</label>
                                        <input type="text" class="form-control" name="host_institution" placeholder="Institution(s) where you studied">
                                    </div>

                                    <div class="form-group">
                                        <label>Academic Programme(s) Attended</label>
                                        <select name="academic_program" class="form-control">
                                            <option value="">Select Programme</option>
                                            <option>MSc</option>
                                            <option>PhD</option>
                                            <option>Post-Doc</option>
                                            <option>Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> Payment Receipt/Transaction copy</label>
                                        <input type="file" class="form-control" name="payment_receipt_copy" accept=".pdf, .jpg, .jpeg, .png">
                                    </div>
                                    <div class="form-group">
                                        <label> Transaction ID</label>
                                        <input type="text" class="form-control" name="transaction_id" placeholder="Enter Transaction Id" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input"  name="declaration" type="checkbox" id="declaration" required>
                                            <label for="declaration" class="custom-control-label">
                                                I hereby declare that I shall abide by all the rules and regulations of the association and shall never do anything subversive to the association.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fas fa-paper-plane mr-2"></i>Submit Application
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>BACSAF</b>
        </div>
        <strong>Bangladesh Association of Commonwealth Scholars and Fellows</strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
</body>
</html>
