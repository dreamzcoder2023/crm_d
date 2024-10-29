@extends('layout.duralux.main')
@section('content')
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <style>
        .error {
            color: red;
            flex: 0 0 100%
        }

        .offcanvas.offcanvas-end {
            width: 80% !important;
        }
    </style>
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Tasks</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.privatedashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Task</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            {{-- <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne">
                                <i class="feather-bar-chart"></i>
                            </a> --}}
                            {{-- <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 12"
                                    data-bs-auto-close="outside">
                                    <i class="feather-filter"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-eye me-3"></i>
                                        <span>All</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-send me-3"></i>
                                        <span>Sent</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-book-open me-3"></i>
                                        <span>Open</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-archive me-3"></i>
                                        <span>Draft</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-bell me-3"></i>
                                        <span>Revised</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-shield-off me-3"></i>
                                        <span>Declined</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-check me-3"></i>
                                        <span>Accepted</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-briefcase me-3"></i>
                                        <span>Leads</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-wifi-off me-3"></i>
                                        <span>Expired</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-users me-3"></i>
                                        <span>Customers</span>
                                    </a>
                                </div>
                            </div> --}}
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 12"
                                    data-bs-auto-close="outside">
                                    <i class="feather-paperclip"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-pdf me-3"></i>
                                        <span>PDF</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-csv me-3"></i>
                                        <span>CSV</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-xml me-3"></i>
                                        <span>XML</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-txt me-3"></i>
                                        <span>Text</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-exe me-3"></i>
                                        <span>Excel</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-printer me-3"></i>
                                        <span>Print</span>
                                    </a>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas"
                                data-bs-target="#proposalSent">
                                <i class="feather-plus me-2"></i>
                                <span>New Task</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
                <div class="accordion-body pb-2">
                    <div class="row">
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fw-bold d-block">
                                            <span class="d-block">Paid</span>
                                            <span class="fs-20 fw-bold d-block">78/100</span>
                                        </a>
                                        <div class="progress-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fw-bold d-block">
                                            <span class="d-block">Unpaid</span>
                                            <span class="fs-20 fw-bold d-block">38/50</span>
                                        </a>
                                        <div class="progress-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fw-bold d-block">
                                            <span class="d-block">Overdue</span>
                                            <span class="fs-20 fw-bold d-block">15/30</span>
                                        </a>
                                        <div class="progress-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fw-bold d-block">
                                            <span class="d-block">Draft</span>
                                            <span class="fs-20 fw-bold d-block">3/10</span>
                                        </a>
                                        <div class="progress-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="proposalList">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Assign From</th>
                                                <th>Assign To (Department)</th>
                                                <th>Assign To (Person)</th>
                                                <th>Task</th>
                                                <th>Status</th>
                                                <th>Brand</th>
                                                <th>Vendor Name</th>
                                                <th>Billing Date</th>
                                                <th>Country</th>
                                                <th>Created at</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Sample row 1 -->
                                            <tr class="single-item">
                                                <td>1</td>
                                                <td>John Doe</td>
                                                <td>Marketing</td>
                                                <td>Sara Smith</td>
                                                <td>Content creation</td>
                                                <td><span class="badge" style="background-color: rgb(185, 185, 38);">In
                                                        Progress</span></td>
                                                <td>ABC Company</td>
                                                <td>XYZ Vendor</td>
                                                <td>2024-07-08</td>
                                                <td>USA</td>
                                                <td>2024-07-07 10:30 AM</td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <div class="dropdown">
                                                            <a href="#" class="avatar-text avatar-md"
                                                                data-bs-toggle="dropdown">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Sample row 2 -->
                                            <tr class="single-item">
                                                <td>2</td>
                                                <td>Jane Doe</td>
                                                <td>HR</td>
                                                <td>Michael Johnson</td>
                                                <td>Employee Training</td>
                                                <td><span class="badge" style="background-color: green;"> Completed </span>
                                                </td>
                                                <td>XYZ Corp</td>
                                                <td>LMN Vendor</td>
                                                <td>2024-07-06</td>
                                                <td>Canada</td>
                                                <td>2024-07-05 09:45 AM</td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <div class="dropdown">
                                                            <a href="#" class="avatar-text avatar-md"
                                                                data-bs-toggle="dropdown">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 3 -->
                                            <tr class="single-item">
                                                <td>3</td>
                                                <td>David Brown</td>
                                                <td>Finance</td>
                                                <td>Emily White</td>
                                                <td>Financial Report</td>
                                                <td><span class="badge" style="background-color:  rgb(185, 185, 38);"> In
                                                        Progress
                                                    </span></td>
                                                <td>PQR Inc.</td>
                                                <td>OPQ Vendor</td>
                                                <td>2024-07-07</td>
                                                <td>UK</td>
                                                <td>2024-07-06 11:15 AM</td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <div class="dropdown">
                                                            <a href="#" class="avatar-text avatar-md"
                                                                data-bs-toggle="dropdown">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 4 -->
                                            <tr class="single-item">
                                                <td>4</td>
                                                <td>Anna Lee</td>
                                                <td>IT</td>
                                                <td>James Smith</td>
                                                <td>Software Development</td>
                                                <td><span class="badge" style="background-color: rgb(0, 162, 255);">
                                                        Pending
                                                    </span></td>
                                                <td>MNO Tech</td>
                                                <td>STU Vendor</td>
                                                <td>2024-07-09</td>
                                                <td>Germany</td>
                                                <td>2024-07-08 08:00 AM</td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <div class="dropdown">
                                                            <a href="#" class="avatar-text avatar-md"
                                                                data-bs-toggle="dropdown">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#" class="dropdown-item">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!--! ================================================================ !-->
        <!--! [Start] Sent Proposal l !-->
        <!--! ================================================================ !-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="proposalSent">
            <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
                <div>
                    <h2 class="fs-16 fw-bold text-truncate-1-line">Make Task</h2>
                    <small class="fs-12 text-muted">Fill the Data to create a Task</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div
                class="py-3 px-4 d-flex justify-content-between align-items-center border-bottom border-bottom-dashed border-gray-5 bg-gray-100">
                <div>
                    <span class="fw-bold text-dark">Date:</span>
                    <span class="fs-11 fw-medium text-muted">{{ now()->format('d M') }},{{ now()->format('Y') }}</span>
                </div>
                <div>
                    {{-- <span class="fw-bold text-dark">Proposal No:</span>
                    <span class="fs-12 fw-bold text-primary c-pointer">#NXL369852</span> --}}
                </div>
            </div>
            {{-- <form action="{{ route('admin.role.store') }}" method="POST" id="roleForm"> --}}
            {{-- @csrf --}}
            <div class="offcanvas-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Assign From:</label>
                            <select class="form-control" name="assign_from">
                                <option value="">Select Assign From</option>
                                <option value="John Doe">John Doe</option>
                                <option value="Jane Smith">Jane Smith</option>
                                <option value="Michael Johnson">Michael Johnson</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Assign To (Department):</label>
                            <select class="form-control" name="assign_to_department">
                                <option value="">Select Department</option>
                                <option value="Marketing">Marketing</option>
                                <option value="HR">HR</option>
                                <option value="IT">IT</option>
                                <!-- Add more departments as needed -->
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Assign To (Person):</label>
                            <select class="form-control" name="assign_to_person">
                                <option value="">Select Person</option>
                                <option value="John Doe">John Doe</option>
                                <option value="Jane Smith">Jane Smith</option>
                                <option value="Michael Johnson">Michael Johnson</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Task:</label>
                            <input type="text" class="form-control" name="task_name" placeholder="Task...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Status:</label>
                            <select class="form-control" name="status">
                                <option value="open">open</option>
                                {{-- <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="pending">Pending</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Brand:</label>
                            <select class="form-control" name="brand">
                                <option value="">Select Brand</option>
                                <option value="ABC Company">ABC Company</option>
                                <option value="XYZ Corp">XYZ Corp</option>
                                <option value="PQR Inc.">PQR Inc.</option>
                                <!-- Add more brands as needed -->
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Vendor Name:</label>
                            <select class="form-control" name="vendor_name">
                                <option value="">Select Vendor Name</option>
                                <option value="LMN Vendor">LMN Vendor</option>
                                <option value="OPQ Vendor">OPQ Vendor</option>
                                <option value="STU Vendor">STU Vendor</option>
                                <!-- Add more vendor names as needed -->
                            </select>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Billing Date:</label>
                            <input type="date" class="form-control" name="billing_date">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label">Country:</label>
                            <select class="form-control" name="country">
                                <option value="">Select Country</option>
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                                <option value="UK">UK</option>
                                <option value="Germany">Germany</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </div>
                    </div>


                    <div class="form-group mb-4">
                        <label class="form-label">Created at:</label>
                        <input type="datetime-local" class="form-control" name="created_at">
                    </div>
                </div>

            </div>
            <div class="px-4 gap-2 d-flex align-items-center ht-80 border border-end-0 border-gray-2">
                <button type="button" class="btn btn-success w-50">Create</button>
                <a href="javascript:void(0);" class="btn btn-danger w-50" data-bs-dismiss="offcanvas">Cancel</a>
            </div>
            {{-- </form> --}}
        </div>
        <!--! ================================================================ !-->
        <!--! [End] Sent Proposal !-->
        <!--! ================================================================ !-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
        <script>
            $('#roleForm').validate({
                rules: {
                    name: "required",
                },
                messages: {
                    name: "Role name is required",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        </script>
    @endsection
