@php
    error_reporting(0);
@endphp
@extends('backend.layouts.admin-master')
@section('title', 'all admin accounts lists')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Admin Accounts </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->








            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('create.admin.account') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Create News Accounts
                            </a>
                            <h4 class="header-title mb-4">All Admin List
                                <button type="button"
                                    class="btn btn-soft-success waves-effect waves-light">{{ $total }}</button>
                            </h4>

                            <div class="row">
                                @foreach ($alladminaccounts as $admin)
                                    <div class="col-lg-4">
                                        <div class="card project-box">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle card-drop arrow-none"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.admin.account', ['id' => $admin->id]) }}">Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('delete.admin.account', ['id' => $admin->id]) }}">Delete</a>
                                                        @if ($admin->status == 'active')
                                                            <a class="dropdown-item"
                                                                href="{{ route('status.admin.account', ['id' => $admin->id]) }}">Inactive
                                                            </a>
                                                        @else
                                                            <a class="dropdown-item"
                                                                href="{{ route('status.admin.account', ['id' => $admin->id]) }}">Active
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div> <!-- end dropdown -->
                                                <!-- Title-->
                                                <h4 class="mt-0"><a
                                                        href="{{ route('author.news', ['id' => $admin->id, 'name' => $admin->name]) }}"
                                                        class="text-dark">
                                                        {{ $admin->name }}
                                                    </a></h4>
                                                <p class="text-muted"><i class="mdi mdi-account-circle"></i>
                                                    <small> {{ $admin->email }}
                                                    </small>
                                                </p>

                                                @if ($admin->status == 'active')
                                                    <div class="badge bg-soft-success text-success mb-3">
                                                        <span>Active</span>

                                                    </div>
                                                @else
                                                    <div class="badge bg-soft-danger text-danger mb-3">
                                                        <span>InActive</span>

                                                    </div>
                                                @endif

                                                @if ($admin->role == 'admin')
                                                    <div class="badge bg-soft-primary text-primary mb-3 ms-3">
                                                        <span>Admin</span>
                                                    </div>
                                                @else
                                                    <div class="badge bg-soft-warning text-warning mb-3 ms-3">
                                                        <span>User</span>
                                                    </div>
                                                @endif

                                                @foreach ($admin->roles as $item)
                                                    
                                                <div class="badge bg-soft-dark text-dark mb-3 ms-3">
                                                    <span>{{ $item->name }}</span>
                                                </div>
                                                @endforeach
                                                <!-- Desc-->
                                                <p class="text-muted font-13 mb-1 sp-line-2">

                                                    {{ Str::limit($admin->details, '150', '...') }}
                                                </p>

                                                <a href="{{ route('author.news', ['id' => $admin->id, 'name' => $admin->name]) }}"
                                                    class="fw-bold text-warning">view
                                                    more</a>
                                                <!-- Task info-->
                                                <p class="mb-1">
                                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                        {{ $admin->username }}
                                                    </span>
                                                    <span class="text-nowrap mb-2 d-inline-block">
                                                        {{ $admin->phone }}
                                                    </span>
                                                </p>
                                                <!-- Team-->
                                                <div class="avatar-group mb-3" id="tooltips-container">
                                                    @if ($admin->image)
                                                        <a href="{{ route('author.news', ['id' => $admin->id, 'name' => $admin->name]) }}"
                                                            class="avatar-group-item shadow">
                                                            <img src="{{ asset($admin->image) }}"
                                                                class="rounded-circle avatar-md" alt="friend"
                                                                data-bs-container="#tooltips-container"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ $admin->name }}/ {{ $admin->email }}" />
                                                        </a>
                                                    @else
                                                        <a href="{{ route('author.news', ['id' => $admin->id, 'name' => $admin->name]) }}"
                                                            class="avatar-group-item shadow">
                                                            <img src="{{ asset('upload/no_image.jpg') }}"
                                                                class="rounded-circle avatar-md" alt="friend"
                                                                data-bs-container="#tooltips-container"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ $admin->name }}/ {{ $admin->email }}" />
                                                        </a>
                                                    @endif


                                                </div>
                                                <!-- Progress-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <strong>Created Time:</strong>
                                                        <br>
                                                        <span>{{ $admin->created_at->format(' d F  Y') }}</span>
                                                        <br>
                                                        <span
                                                            class=" text-primary">({{ $admin->created_at->diffForHumans() }})</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Last Updated:</strong>
                                                        <br>
                                                        <span>{{ $admin->updated_at->format(' d F  Y') }}</span>
                                                        <br>
                                                        <span
                                                            class=" text-info">({{ $admin->updated_at->diffForHumans() }})</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h5 class="mt-3 text-muted">Activity of Social Media</h5>
                                                <ul class="social-list list-inline mt-3 mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ $admin->facebook }}"
                                                            class="social-list-item border-primary text-primary"><i
                                                                class="mdi mdi-facebook"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ $admin->twitter }}"
                                                            class="social-list-item border-info text-info"><i
                                                                class="mdi mdi-twitter"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ $admin->instagram }}"
                                                            class="social-list-item border-warning text-warning"><i
                                                                class="mdi mdi-instagram"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ $admin->youtube }}"
                                                            class="social-list-item border-danger text-danger"><i
                                                                class="mdi mdi-youtube"></i></a>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <a href="{{ $admin->github }}"
                                                            class="social-list-item border-secondary text-secondary"><i
                                                                class="mdi mdi-github"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- end card box-->
                                    </div><!-- end col-->
                                @endforeach
                            </div>
                            <div>
                                {{ $alladminaccounts->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>


        </div> <!-- container -->
    </div> <!-- container -->
@endsection
@push('script-file')
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
