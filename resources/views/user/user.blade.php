<div class="card shadow mb-4">
    <div class="card-header py-auto d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Registered Users</h6>
        <a href="#" class="btn btn-primary">Add User</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                <thead class="table-primary ">
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>College/Campus Name</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody" >
                    <!-- Table body will be populated using AJAX -->
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
            
            function loadUsersPage(page) {
                $.ajax({
                    url: '{{ route("users-paginated") }}?page=' + page,
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {

                        var tableBody = '';
                        // Loop through the data and build table rows
                        $.each(response.user.data, function (index, user) {
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
                        $.each(response.user.links, function (index, link) {
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
            loadUsersPage(1);

            // Handle pagination link clicks using event delegation
            $(document).on('click', '#paginationLinks a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadUsersPage(page);
            });

            $('#tableBody').on('click', '#editBtn', function () {
                var userId = $(this).data('user_id');
                console.log(userId);
            });
        });
    </script>
@endsection
