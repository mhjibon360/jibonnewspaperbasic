@extends('backend.layouts.admin-master')
@section('title', 'all listed role has permissions')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Role-Has-Permissions </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('role-has-permission.create') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add Role-Has-Permissions
                            </a>
                            <h4 class="header-title mb-4">All Role-Has-Permissions List</h4>

                            <div class="table-responsive">
                                <table class="table table-hover m-0 table-centered   w-100"
                                    id="tickets-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #SI
                                            </th>
                                            <th>Role Name</th>
                                            <th>Permissions Name</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($allrole as $item)
                                            <tr>
                                                <td><b>#{{ $loop->index + 1 }}</b></td>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    @foreach ($item->permissions as $perm)
                                                        <span class=" badge bg-primary">
                                                            {{ $perm->name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $item->created_at->format('d/F/Y') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('role-has-permission.edit', $item->id) }}"
                                                        class="btn btn-primary  waves-effect waves-light">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('role-has-permission.destroy', $item->id) }}"
                                                        method="post" class=" d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger  waves-effect waves-light delete-btn"
                                                            id="delete-btn">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>


        </div> <!-- container -->
    </div> <!-- container -->
@endsection
@push('script-file')
    <!-- third party css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- third party js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js">
    </script>
    <!-- third party js ends -->
    <!-- Tickets js -->
    <script src="{{ asset('backend') }}/assets/js/pages/tickets.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#delete-btn', function(event) {
                event.preventDefault();
                var form = $(this).closest('form');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });

            });
        });
    </script>
@endpush
