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
    
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
    
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
    
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px; /* This will make the slider background rounded */
        }
    
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%; /* This will make the toggle circle rounded */
        }
    
        input:checked + .slider {
            background-color: #4CAF50;
        }
    
        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
    
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">User</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.privatedashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">User</li>
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
                            {{-- <div class="dropdown">
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
                            </div> --}}
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>New User</span>
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
                                                {{-- <th class="wd-30">
                                                    <div class="btn-group mb-1">
                                                        <div class="custom-control custom-checkbox ms-1">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="checkAllProposal">
                                                            <label class="custom-control-label"
                                                                for="checkAllProposal"></label>
                                                        </div>
                                                    </div>
                                                </th> --}}
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Country</th>
                                                <th>Region</th>
                                                <th>Pincode</th>
                                                <th>Status</th>
                                                <th >Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $user)
                                                <tr class="single-item">
                                                    {{-- <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox"
                                                                id="checkBox_1">
                                                            <label class="custom-control-label" for="checkBox_1"></label>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>@if($user->profile != '' || $user->profile != null) <img class="rounded float-left" src="{{url('public/profile/'.$user->profile) }}" width="30px">  @endif{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    <td>{{ $user->address }}</td>
                                                    <td>{{ $user->country }}</td>
                                                    <td>{{ $user->region }}</td>
                                                    <td>{{ $user->pincode }}</td>
                                                    <td><label class="switch">
                                                        <input type="checkbox" id="profilePrivacyToggle"
                                                            {{ $user->status == 1 ? 'checked' : '' }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <td>
                                                        <div class="hstack gap-2 justify-content-end">
                                                            {{-- <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                                data-bs-toggle="offcanvas" data-bs-target="#proposalSent">
                                                                <i class="feather feather-send"></i>
                                                            </a> --}}
                                                            {{-- <a href="proposal-view.html" class="avatar-text avatar-md">
                                                                <i class="feather feather-eye"></i>
                                                            </a> --}} 
                                                            {{-- <div class="dropdown"> --}}
                                                                {{-- <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                                    data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                    <i class="feather feather-more-horizontal"></i>
                                                                </a> --}}
                                                                {{-- <ul class="dropdown-menu">
                                                                    <li> --}}
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin.user.edit', $user->id) }}">
                                                                            <i class="feather feather-edit-3 me-3"></i>
                                                                          
                                                                        </a>
                                                                    {{-- </li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li> --}}
                                                                        <form
                                                                            action="{{ route('admin.user.destroy', $user->id) }}"
                                                                            method="POST" class="delete-form">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="dropdown-item">
                                                                                <i class="feather feather-trash-2 me-3"></i>
                                                                             
                                                                            </button>
                                                                        </form>
                                                                    {{-- </li>
                                                                </ul>
                                                            </div> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
                    <h2 class="fs-16 fw-bold text-truncate-1-line">Create Role</h2>
                    <small class="fs-12 text-muted">Fill the Data to create a role</small>
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
            <form action="{{ route('admin.role.store') }}" method="POST" id="roleForm">
                @csrf
                <div class="offcanvas-body">
                    <div class="form-group mb-4">
                        <label class="form-label">Role Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" placeholder="Enter a role name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="px-4 gap-2 d-flex align-items-center ht-80 border border-end-0 border-gray-2">
                    <button type="submit" class="btn btn-success w-50">Create</button>
                    <a href="javascript:void(0);" class="btn btn-danger w-50" data-bs-dismiss="offcanvas">Cancel</a>
                </div>
            </form>
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
