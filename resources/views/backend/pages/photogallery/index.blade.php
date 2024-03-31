@extends('backend.layouts.admin-master')
@section('title', 'all photo gallery show')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">photogallery  {{ count($allphoto) }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->








            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('photogallery.create') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add photogallery
                            </a>
                            <h4 class="header-title mb-4">All Gallery Photo List</h4>

                            <div class="table-responsive">
                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100"
                                    id="tickets-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #SI
                                            </th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($allphoto as $item)
                                            <tr>
                                                <td><b>#{{ $loop->index + 1 }}</b></td>



                                                <td>
                                                    <img src="{{ asset($item->image) }}" class=" img-fluid img-thumbnail"
                                                        style="height: 200px;width:200px;" alt="">
                                                </td>


                                                <td>
                                                    @if ($item->status == '1')
                                                        <span class="badge bg-soft-success text-success">Active</span>
                                                    @else
                                                        <span class="badge bg-soft-warning text-warning">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    {{ $item->created_at->format('d/F/Y') }}
                                                </td>

                                                <td>
                                                    <a href="{{ route('photogallery.edit', $item->id) }}" title="edit news"
                                                        class="btn btn-primary  waves-effect waves-light">
                                                        <i class="far fa-edit"></i>
                                                    </a>


                                                    @if ($item->status == '1')
                                                        <a href="{{ route('photogallery.show', $item->id) }}"
                                                            title="inactive news"
                                                            class="btn btn-warning  waves-effect waves-light text-white">
                                                            <i class="fas fa-thumbs-down"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('photogallery.show', $item->id) }}"
                                                            title="active news"
                                                            class="btn btn-primary  waves-effect waves-light">
                                                            <i class=" fas fa-thumbs-up"></i>
                                                        </a>
                                                    @endif

                                                    <form action="{{ route('photogallery.destroy', $item->id) }}"
                                                        method="post" class=" d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger  waves-effect waves-light delete-btn"
                                                            title="delete news" id="delete-btn">
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
