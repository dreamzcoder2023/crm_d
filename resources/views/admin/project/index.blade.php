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
            border-radius: 34px;
            /* This will make the slider background rounded */
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
            border-radius: 50%;
            /* This will make the toggle circle rounded */
        }

        input:checked+.slider {
            background-color: #4CAF50;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>

    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Project</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.privatedashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Project</li>
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
                            <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas"
                                data-bs-target="#proposalSent">
                                <i class="feather-plus me-2"></i>
                                <span>New Project</span>
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

            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Customer Name</th>
                                                <th>Total KW</th>
                                               
                                                <th>Total Amperage</th>
                                                <th>Main Cable</th>
                                                <th>Required Transformer size or load</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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
                    <h2 class="fs-16 fw-bold text-truncate-1-line">Create Project</h2>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.project.store') }}" method="POST" id="roleForm">
                @csrf
                <div class="offcanvas-body">
                    <div class="form-group mb-4">
                        <label class="form-label">Customer: <span class="text-danger">*</span></label>
                        <select class="form-control" name="user_id">
                            <option value="">Select</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Project Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" placeholder="Enter a equipment name">
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
        <div class="offcanvas offcanvas-end" tabindex="-1" id="proposalSent_edit">
            <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
                <div>
                    <h2 class="fs-16 fw-bold text-truncate-1-line">Edit Project</h2>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="load_edit">
            </div>
        </div>
        <!-- delete popup -->
        <div style="z-index:9999 !important;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div style="z-index:9999 !important;" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete popup -->
        <!--! ================================================================ !-->
        <!--! [End] Sent Proposal !-->
        <!--! ================================================================ !-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.project.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'customer_name',
                            name: 'customer_name'
                        },
                        {
                            data: 'total_kw',
                            name: 'total_kw'
                        },
                        {
                            data: 'total_amperage',
                            name: 'total_amperage'
                        },
                        {
                            data: 'main_cable',
                            name: 'main_cable'
                        },
                        {
                            data: 'recommand',
                            name: 'recommand'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
            $('#roleForm').validate({
                rules: {
                    name: "required",
                    user_id: "required"
                },
                messages: {
                    name: "Project name is required",
                    user_id: "Customer is required"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            $(document).on('click', '.edit_model', function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.project.edit') }}",
                    data: {
                        id: id
                    },
                    cache: false,
                    success: function(data) {
                        console.log('response', data);
                        $('.load_edit').html(data);
                        // $('#proposalSent_edit').show();
                        var offcanvasElement = new bootstrap.Offcanvas(document.getElementById(
                            'proposalSent_edit'));
                        offcanvasElement.show();
                    }
                });
            });
            $(document).on('click', '.delete_model', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    console.log("Result:", result); // Log the result object
                    console.log("isConfirmed:", result.isConfirmed);
                    if (result.value == true) {

                        console.log('Item deleted');

                        $.ajax({
                            type: "post",
                            url: "{{ route('admin.project.delete') }}",
                            data: {
                                id: id,
                                _token: "{{ csrf_token() }}"
                            },
                            cache: false,
                            success: function(data) {
                                console.log('response', data);
                                $(function() {
                                    toastr.success('Project Deleted Success', {
                                        timeOut: 1000,
                                        fadeOut: 1000,
                                    });
                                });
                                $('.data-table').DataTable().ajax.reload();
                            }
                        });

                    }
                });
            });
        </script>
    @endsection
