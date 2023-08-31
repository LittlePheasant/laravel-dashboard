
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Filepond stylesheet -->
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css' />
        <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css' />

        <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />
        
        <meta name="csrf-token" content="{{ csrf_token() }}" />

    </head>
    <body>
        <div class="card shadow mb-4">
            <div class="card-header py-auto d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Accomplishment Report</h6>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addReportModal">Add Report</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                        <thead class="table-success text-gray-800">
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2">College/Campus</th>
                                <th rowspan="2">Inclusive Dates</th>
                                <th rowspan="2">Title</th>
                                <th rowspan="2">Type of Beneficiaries</th>
                                <th colspan="3">No. of Beneficiaries</th>
                                <th colspan="5">Quality and Relevance Rating</th>
                                <th rowspan="2">Duration</th>
                                <th rowspan="2">Type of Service Rendered</th>
                                <th rowspan="2">Partner Agency/Industry/Community</th>
                                <th rowspan="2">Faculty/Staff Involved</th>
                                <th rowspan="2">Nature of Participation</th>
                                <th rowspan="2">Cost and Funding Source</th>
                                <th rowspan="2">Attachment</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Total</th>
                                <th>1 P</th>
                                <th>2 F</th>
                                <th>3 S</th>
                                <th>4 V S</th>
                                <th>5 E</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" >
                        
                        </tbody>
                    </table>
                </div>
                <div id="paginationLinks">
                    <!-- Pagination links will be populated using AJAX -->
                </div>
            </div>

        </div>

        <div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD REPORT</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- Program Option -->
                            <div class="col-12">
                                <label for="programOpt" class="form-label">Program</label>
                                <select id="programOpt" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>

                            <!-- Inculsive Dates -->
                            <label class="form-label">Inculsive Dates</label>
                            <div class="col-12 d-flex">
                                
                                <div class="col-md-6">
                                    <label for="startdate" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="startdate">
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="endDate">
                                </div>
                            </div>

                            <!-- Title -->
                            <div class="col-12">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter a Title here">
                            </div>

                            <!-- Type of Beneficiaries -->
                            <div class="col-12">
                                <label for="type_beneficiaries" class="form-label">Type of Beneficiaries</label>
                                <input type="text" class="form-control" id="type_beneficiaries" placeholder="Sector/Clientele">
                            </div>

                            <!-- No. of Beneficiaries -->
                            <label class="form-label">No. of Beneficiaries</label>
                            <div class="col-12 d-flex">
                                
                                <!-- Male Count -->
                                <div class="col-md-6">
                                    <label for="male_count" class="form-label">Male</label>
                                    <input type="number" class="form-control" id="male_count">
                                </div>
                                
                                <!-- Female Count -->
                                <div class="col-md-6">
                                    <label for="female_count" class="form-label">Female</label>
                                    <input type="number" class="form-control" id="female_count">
                                </div>
                            </div>

                            <!-- Quality and Relevance Rating -->
                            <label class="form-label">Quality and Relevance Rating</label>
                            <div class="col-12 d-flex">
                                
                                <!-- Poor Rate -->
                                <div class="col-md-4">
                                    <label for="poor_rate" class="form-label">Poor</label>
                                    <input type="number" class="form-control" id="poor_rate">
                                </div>

                                <!-- Fair Rate -->
                                <div class="col-md-4">
                                    <label for="fair_rate" class="form-label">Fair</label>
                                    <input type="number" class="form-control" id="fair_rate">
                                </div>

                                <!-- Satisfactory Rate -->
                                <div class="col-md-4">
                                    <label for="satisfactory_rate" class="form-label">Satisfactory</label>
                                    <input type="number" class="form-control" id="satisfactory_rate">
                                </div>
                            </div>
                            <div class="col-12 d-flex">

                                <!-- Very Satisfactory Rate -->
                                <div class="col-md-4">
                                    <label for="verysatisfactory_rate" class="form-label">Very Satisfcatory</label>
                                    <input type="number" class="form-control" id="verysatisfactory_rate">
                                </div>

                                <!-- Excellent Rate -->
                                <div class="col-md-4">
                                    <label for="excellent_rate" class="form-label">Excellent</label>
                                    <input type="number" class="form-control" id="excellent_rate">
                                </div>
                            </div>

                            <!-- Duation and Unit of Measure(Days/Hours) -->
                            <label class="form-label">Duation and Unit of Measure(Days/Hours)</label>
                            <div class="col-12 d-flex">
                                
                                <!-- Duration -->
                                <div class="col-md-6">
                                    <label for="duration" class="form-label">Duration</label>
                                    <input type="number" class="form-control" id="duration">
                                </div>

                                <!-- Unit of Measure(Days/Hours) -->
                                <div class="col-md-6">
                                    <label for="unitOpt" class="form-label">Unit of Measure</label>
                                    <select id="unitOpt" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>Days</option>
                                        <option>Hours</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Type of Extension Services Rendered -->
                            <div class="col-12">
                                <label for="services" class="form-label">Type of Extension Services Rendered</label>
                                <input type="text" class="form-control" id="services" placeholder="Training, Outreach, Consultancy, GAD, etc.">
                            </div>

                            <!-- Partner Agency/Industry/Community -->
                            <div class="col-12">
                                <label for="partners" class="form-label">Partner Agency/Industry/Community</label>
                                <input type="text" class="form-control" id="partners">
                            </div>

                            <!-- Faculty/Staff Involved -->
                            <div class="col-12">
                                <label for="fac_staff" class="form-label">Faculty/Staff Involved</label>
                                <input type="text" class="form-control" id="fac_staff">
                            </div>

                            <!-- Nature of Participation -->
                            <div class="col-12">
                                <label for="role" class="form-label">Nature of Participation</label>
                                <input type="text" class="form-control" id="role">
                            </div>

                            <!-- Cost and Funding Source -->
                            <div class="col-12">
                                <label for="cost_fund" class="form-label">Cost and Funding Source</label>
                                <input type="number" class="form-control" id="cost_fund" placeholder="Php 0.00">
                            </div>

                            <!-- Attachment -->
                            <div class="col-12">
                                <label for="file" class="form-label">Attachment</label>
                                <input type="file" name="file" id='file' class='p-5' 
                                        data-allow-reorder="true"
                                        data-max-file-size="3MB"
                                        data-max-files="3"
                                >
                            </div>
                            
                        </form>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" id='saveBtn' class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load FilePond library -->
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

        <script>

            //configuration filepond
            const inputElement = document.querySelector('input[id="file"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement);

            //tujuan filepond
            FilePond.setOptions({
                server: {
                    process: {            //upload
                        url: '{{ route('upload')}}',
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(response) {
                            console.log('error')
                        }
                    }, 
                    revert: (uniqueFileId, load, error) => {

                        //delete file
                        deleteFile(uniqueFileId);

                        error('Error to delete file');

                        load();
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token()}}'
                    },
                }
            });
            //end config filepond

            function deleteFile(nameFile){
                $.ajax({
                    url: '{{ route('destroy') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "DELETE",
                    data: {
                        filename: nameFile
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(response) {
                        console.log('error')
                    }
                });
            }

        </script>
    </body>
</html>
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            
            function loadReportsPage(page) {
                $.ajax({
                    url: '{{ route("acc-report") }}?page=' + page,
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {

                        var tableBody = '';
                        // Loop through the data and build table rows
                        $.each(response.report.data, function (index, report) {
                            tableBody += '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + report.user.campus_name + '</td>' +
                                '<td>' + report.date_entry + '</td>' +
                                '<td>' + report.title + '</td>' +
                                '<td>' + report.type_beneficiary + '</td>' +
                                '<td>' + report.count_male + '</td>' +
                                '<td>' + report.count_female + '</td>' +
                                '<td>' + (report.count_male + report.count_female) + '</td>' +
                                '<td>' + report.poor_rate + '</td>' +
                                '<td>' + report.fair_rate + '</td>' +
                                '<td>' + report.satisfactory_rate + '</td>' +
                                '<td>' + report.verysatisfactory_rate + '</td>' +
                                '<td>' + report.excellent_rate + '</td>' +
                                '<td>' + report.duration + '</td>' +
                                '<td>' + report.serviceOpt + '</td>' +
                                '<td>' + report.partners + '</td>' +
                                '<td>' + report.fac_staff + '</td>' +
                                '<td>' + report.role + '</td>' +
                                '<td>' + report.cost_fund + '</td>' +
                                '<td>' + report._file + '</td>' +
                                '<td>' +
                                '<div class="btn-group" role="group" aria-label="Basic example">' +
                                '<button class="btn m-1 btn-primary btn-circle"><i class="fas fa-fw fa-lock"></i></button>' +
                                '<button class="btn m-1 btn-secondary btn-circle"><i class="fas fa-fw fa-lock-open"></i></button>' +
                                '<button class="btn m-1 btn-warning btn-circle" id="editBtn"><i class="fas fa-fw fa-pen"></i></button>' +
                                '<form action="#" method="POST" type="button" onsubmit="return confirm(\'Delete?\')">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button class="btn m-1 btn-danger btn-circle"><i class="fas fa-fw fa-archive"></i></button>' +
                                '</form>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        });

                        $('#tableBody').html(tableBody);

                        // Update pagination links
                        var paginationLinks = '';
                        $.each(response.report.links, function (index, link) {
                            var activeClass = link.active ? 'active' : '';
                            paginationLinks += '<li class="page-item ' + activeClass + '"><a class="page-link" href="' + link.url + '">' + link.label + '</a></li>';
                        });
                        $('#paginationLinks').html('<ul class="pagination">' + paginationLinks + '</ul>');
                    },
                    error: function () {
                        console.log('Error loading paginated data.');
                    }
                });
            }

            // Load the initial page of paginated data
            loadReportsPage(1);

            // Handle pagination link clicks using event delegation
            $(document).on('click', '#paginationLinks a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadReportsPage(page);
            });

        });

    </script>
@endsection
