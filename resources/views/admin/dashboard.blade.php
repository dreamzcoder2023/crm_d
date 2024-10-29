@extends('layout.duralux.main')

@section('content')
    @php
        $user = Auth::user()->roles;
        // dd($user);
    @endphp
    <style>
        #calendar {
            padding: 10px;
        }

        .fc-toolbar-title {
            font-size: 18px !important;
        }
    </style>
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    {{-- <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                                <span class="reportrange-picker-field"></span>
                            </div>
                            <div class="dropdown filter-dropdown">
                                <a class="btn btn-md btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                    data-bs-auto-close="outside">
                                    <i class="feather-filter me-2"></i>
                                    <span>Filter</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Role"
                                                checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Role">Role</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Team"
                                                checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Team">Team</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Email"
                                                checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Email">Email</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Member"
                                                checked="checked" />
                                            <label class="custom-control-label c-pointer" for="Member">Member</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Recommendation"
                                                checked="checked" />
                                            <label class="custom-control-label c-pointer"
                                                for="Recommendation">Recommendation</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-plus me-3"></i>
                                        <span>Create New</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-filter me-3"></i>
                                        <span>Manage Filter</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">

                    <div class="col-xxl-3 col-md-6">
                        <div class="card bg-primary border-primary text-white overflow-hidden">
                            <div class="card-body">
                                <i class="feather-users fs-20"></i>
                                <h5 class="fs-4 text-reset mt-4 mb-1">{{ $user_count }}</h5>
                                <div class="fs-12 text-reset fw-normal">Users</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card bg-success border-success text-white overflow-hidden">
                            <div class="card-body">
                                <i class="bi bi-list-task fs-20"></i>
                                <h5 class="fs-4 text-reset mt-4 mb-1">{{ $equipment_count }}</h5>
                                <div class="fs-12 text-reset fw-normal">Equipments</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card bg-warning border-warning text-white overflow-hidden">
                            <div class="card-body">
                                <i class="fa fa-tasks-alt fs-20"></i>
                                <h5 class="fs-4 text-reset mt-4 mb-1">{{ $equi_type_count }}</h5>
                                <div class="fs-12 text-reset fw-normal">Equipment Type</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6">
                        <div class="card bg-danger border-danger text-white overflow-hidden">
                            <div class="card-body">
                                <i class="feather feather-check-square fs-20"></i>
                                <h5 class="fs-4 text-reset mt-4 mb-1">{{ $equi_model_count }}</h5>
                                <div class="fs-12 text-reset fw-normal">Equipment Model</div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Monthly Planner</h5>

                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div id="calendar"></div>
                            </div>

                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>


        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.14/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.14/index.global.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });

                calendar.render();

                // Add event listener to handle window resize
                window.addEventListener('resize', function() {
                    setTimeout(function() {
                        calendar.updateSize();
                    }, 300); // Adjust the delay as needed
                });
            });
        </script>
    @endsection
