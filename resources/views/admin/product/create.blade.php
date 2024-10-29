@extends('layout.duralux.main')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .error {
            color: red;
            flex: 0 0 100%;
        }

        #passwordVerified {
            flex: 0 0 100%
        }

        .small-input {
            width: 150px;
            /* Adjust the width as needed */
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
                        <h5 class="m-b-10">Profile Settings</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.privatedashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Profile</li>
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

                    </div>
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
                    <div class="col-lg-12">
                        <div class="card border-top-0">

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Product Information:</span>
                                                {{-- <span class="fs-12 fw-normal text-muted text-truncate-1-line">Following
                                                    information is publicly displayed, be careful! </span> --}}
                                            </h5>
                                            {{-- <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Add New</a> --}}
                                        </div>

                                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" id="profileForm">
                                            @csrf
                                          

                                            <!-- Project and Customer fields on the same line -->
                                            <div class="row mb-4">
                                                <div class="col-lg-6">
                                                    <label for="productSelect" class="fw-semibold">Project:</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="project_id" id="productSelect" required>
                                                            <option value="">Select</option>
                                                            @foreach ($project as $project)
                                                                <option value="{{ $project->id }}"
                                                                    data-cust="{{ $project->user_id }}">{{ $project->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="customerSelect" class="fw-semibold">Customer Name:</label>
                                                    <div class="input-group">
                                                        <input type="hidden" name="user_id" value="" id="user_id">
                                                        <input type="text" class="form-control" 
                                                            value="" id="cust_id" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />

                                            <!-- Equipment fields container -->
                                            <div id="equipmentRows">
                                                <div class="row mb-4 equipment-row">
                                                    <div class="col-lg-2">
                                                        <label for="equipmentSelect" class="fw-semibold">Equipment:</label>
                                                        <div class="input-group">
                                                            <select class="form-control" name="equipment_id" required>
                                                                <option value="">Select</option>
                                                                @foreach ($equipment as $equipment)
                                                                    <option value="{{ $equipment->id }}">
                                                                        {{ $equipment->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="typeSelect" class="fw-semibold">Type:</label>
                                                        <div class="input-group">
                                                            <select class="form-control" name="equipment_type_id"
                                                                id="equipment_type_id" required>
                                                                <option value="">Select</option>
                                                                @foreach ($type as $type)
                                                                    <option value="{{ $type->id }}">{{ $type->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="modelSelect" class="fw-semibold">Model:</label>
                                                        <div class="input-group">
                                                            <select class="form-control" name="equipment_model_id"
                                                                id="equipment_model_id" required>
                                                                <option value="">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="kwInput" class="fw-semibold">Kw:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="kw" id="kw" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="totalKwInput" class="fw-semibold">Total Kw:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="total_kw" id="total_kw" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="amperageInput" class="fw-semibold">Amperage:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="amperage" id="amperage" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mt-2">
                                                        <label for="recBreakerSizeInput" class="fw-semibold">Recommended
                                                            Breaker Size:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control small-input"
                                                                name="rec_breaker_size" id="breaker_size" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="row mb-4">
                                                <div class="col-lg-3">
                                                    <button type="button" class="btn btn-outline-primary" id="addRowButton">
                                                        <i class="feather-plus"></i> Add Row
                                                    </button>
                                                </div>
                                            </div> --}}

                                            <center><button type="submit" class="btn btn-success">Save Changes</button>
                                            </center>
                                        </form>


                                    </div>
                                    <hr class="my-0">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
        <script>
            //      document.getElementById('addRowButton').addEventListener('click', function() {
            //     // Get the existing equipment row
            //     const existingRow = document.querySelector('.equipment-row');

            //     // Clone the existing row
            //     const newRow = existingRow.cloneNode(true);

            //     // Clear the input values in the new row
            //     const inputs = newRow.querySelectorAll('input');
            //     inputs.forEach(input => {
            //         input.value = '';
            //     });
            //     const selects = newRow.querySelectorAll('select');
            //     selects.forEach(select => {
            //         select.selectedIndex = 0; // Reset select to the first option
            //     });

            //     // Append the new row to the equipmentRows container
            //     document.getElementById('equipmentRows').appendChild(newRow);
            // });
            $('#productSelect').change(function() {
                var id = $(this).find(':selected').data('cust');
                console.log(id);
                $.ajax({
                    type: "get",
                    url: "{{ route('admin.customer_details') }}",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    cache: false,
                    success: function(data) {
                        console.log('response', data);
                        $('#cust_id').val(data.name);
                        $('#user_id').val(data.id);
                    }
                });
            });
            $('#equipment_type_id').change(function() {
                var id = $(this).find(':selected').val();
                console.log(id);
                $.ajax({
                    type: "get",
                    url: "{{ route('admin.model_details') }}",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    cache: false,
                    success: function(data) {
                        console.log('response', data);
                        //$('#cust_id').val(data);
                        $('select[name="equipment_model_id"]').empty();
                        $('select[name="equipment_model_id"]').append(
                            '<option value="">Select Model</option>');

                        // Iterate over the returned business types and append each one to the dropdown
                        $.each(data, function(index, value) {
                            console.log('Business Type:', value); // Log each object to inspect
                            $('select[name="equipment_model_id"]').append('<option value="' + value
                                .id + '">' +
                                value.name + '</option>');
                        });

                    }
                });
            });
            $('#equipment_model_id').change(function() {
                var type_id = $('#equipment_type_id').find(':selected').val();
                var id = $(this).find(':selected').val();
                console.log(id);
                $.ajax({
                    type: "get",
                    url: "{{ route('admin.kw_details') }}",
                    data: {
                        id: id,
                        type_id:type_id,
                        _token: "{{ csrf_token() }}"
                    },
                    cache: false,
                    success: function(data) {
                        console.log('response', data);
                        //$('#cust_id').val(data);
                        $('#kw').val(data.kw);
                        $('#total_kw').val(data.total_kw);
                        $('#amperage').val(data.amerage);
                        $('#breaker_size').val(data.breaker_size);
                       
                    }
                });
            });
        </script>
    @endsection
