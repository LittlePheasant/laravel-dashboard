<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')

<div class="container-fluid">

<div class="row">

    <!-- Total Users Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            User</div>
                        @if($user_length)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user_length}}</div>
                        @endif
                    </div>
                    <div class="col-auto">
                        <a id="showUserTableBtn">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Tasks Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Program
                        </div>
                        @if($program_length)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$program_length}}</div>
                        @endif
                    </div>
                    <div class="col-auto">
                        <a id="showProgramTableBtn">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Total Accomplishment Report Card -->
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
        
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Accomplishment Report</div>
                        @if($report_length)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$report_length}}</div>
                        @endif
                    </div>
                    <div class="col-auto">
                        <a id="showAccReportTableBtn">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        
        </div>
    </div>


    <!-- Actual Reports Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Actual Accomplishments</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $actualreport_length}}</div>
                    </div>
                    <div class="col-auto">
                        <a id="showActualReportTableBtn">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid" id="barChart">

            <!-- Content Row -->
<div class="row">

    <div class="col-xl-8 col-lg-7">

        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
                <hr>
                Styling for the bar chart can be found in the
                <code>/js/demo/chart-bar-demo.js</code> file.
            </div>
        </div>

    </div>
    
</div>

</div>
<!-- /.container-fluid -->

<div class="card shadow mb-4" id="tableContainer">

<div class="card-body">
<div class="table-responsive">
    <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
        <thead class="table-primary" id="tableHeader">

        </thead>
        <tbody id="tableBody">
            <!-- Table body will be populated using AJAX -->
        </tbody>
    </table>
</div>
<div id="paginationLinks">
    <!-- Pagination links will be populated using AJAX -->
</div>
</div>

</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        
        $(document).ready(function () {


            $('#showAccReportTableBtn').click(function () {
                $('#barChart').hide();
                $.get('{{route('acc-report')}}', function(data) {
         
                    $('#tableContainer').html(data.headers);

                    var tableBody = '';
                        // Loop through the data and build table rows
                        $.each(data.report.data, function (index, report) {
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
                        $.each(data.report.links, function (index, link) {
                            var activeClass = link.active ? 'active' : '';
                            paginationLinks += '<li class="page-item ' + activeClass + '"><a class="page-link" href="' + link.url + '">' + link.label + '</a></li>';
                        });
                        $('#paginationLinks').html('<ul class="pagination">' + paginationLinks + '</ul>');  

                });
            });

            $('#showActualReportTableBtn').click(function () {
                $('#barChart').hide();
                $.get('{{route('actual-reports')}}', function(data) {
                    $('#tableContainer').html(data);
                });
            });

            $('#showUserTableBtn').click(function () {
                $('#barChart').hide();
                $.get('{{route('users-paginated')}}', function(data) {
                    
                    $('#tableContainer').html(data.headers);

                    var tableBody = '';
                    $.each(data.user.data, function (index, user) {
                        tableBody += '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + user.imagename + '</td>' +
                            '<td>' + user.campus_name + '</td>' +
                            '<td>' + user.name + '</td>' +
                            '<td>' + user.username + '</td>' +
                            '<td>' + user.user_email + '</td>' +
                            '<td>' + user.user_role + '</td>' +
                            '<td>' +
                            '<div class="btn-group" role="group" aria-label="Basic example">' +
                            '<button class="btn m-1 btn-warning btn-circle" id="editBtn" data-user-id="'+ user.user_id +'"><i class="fas fa-fw fa-pen"></i></button>' +
                            '<form action="#" method="POST" type="button" onsubmit="return confirm(\'Delete?\')">' +
                            '@csrf' +
                            '@method("DELETE")' +
                            '<button class="btn m-1 btn-danger btn-circle"><i class="fas fa-fw fa-archive"></i></button>' +
                            '</form>' +
                            '</div>' +
                            '</td>' +
                            '</tr>';
                    });

                    $('#tableBody').html(tableBody);
                    
                    // Update pagination links
                    var paginationLinks = '';
                        $.each(data.user.links, function (index, link) {
                            var activeClass = link.active ? 'active' : '';
                            paginationLinks += '<li class="page-item ' + activeClass + '"><a class="page-link" href="' + link.url + '">' + link.label + '</a></li>';
                        });
                    $('#paginationLinks').html('<ul class="pagination">' + paginationLinks + '</ul>');

                    $('#tableBody').on('click', '#editBtn', function () {
                        var userId = $(this).data('user-id');   
                        
                        $.get('{{ route('userInfoByID', 'userId') }}' , function(data) {
                            console.log(data);
                        });
                        
                    });
                });

                
            });

            $('#showProgramTableBtn').click( function () {
                $('#barChart').hide();
                $.get('{{route('program-list')}}', function(data) {

                    $('#tableContainer').html(data.headers);
                    
                    var tableBody = '';
                    // Loop through the data and build table rows
                    $.each(data.program.data, function (index, program) {
                        tableBody += '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + program.user.campus_name + '</td>' +
                            '<td>' + program.program + '</td>' +
                            '<td>' + program.description + '</td>' +
                            '<td>' +
                            '<div class="btn-group" role="group" aria-label="Basic example">' +
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
                    $.each(data.program.links, function (index, link) {
                        var activeClass = link.active ? 'active' : '';
                        paginationLinks += '<li class="page-item ' + activeClass + '"><a class="page-link" href="' + link.url + '">' + link.label + '</a></li>';
                    });
                    $('#paginationLinks').html('<ul class="pagination">' + paginationLinks + '</ul>');
                });
            });
        });

    </script>
@endsection