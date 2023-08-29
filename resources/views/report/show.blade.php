

<div class="card shadow mb-4">
    <div class="card-header py-auto d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Accomplishment Report</h6>
        <a href="#" class="btn btn-primary">Add Report</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                <thead class="table-success ">
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
