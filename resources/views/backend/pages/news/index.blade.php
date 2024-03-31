@extends('backend.layouts.admin-master')
@section('title', 'all listed news')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">News </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-primary">
                                        <i class="fe-tag font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ count($allnews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Total NewsPosts</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-warning">
                                        <i class="fe-clock font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                @php
                                    $inactivenews = App\Models\News::where('status', '0')->latest()->get();
                                @endphp
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ count($inactivenews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Inactive Newsposts</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-success">
                                        <i class="fe-check-circle font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                @php
                                    $activenews = App\Models\News::where('status', '1')->latest()->get();
                                @endphp
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ count($activenews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Active News</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->


            </div>


            @php
                $breaking = App\Models\News::where('show_at_breaking', '1')->latest()->get();
                $slider = App\Models\News::where('show_at_slider', '1')->latest()->get();
                $three = App\Models\News::where('show_at_three', '1')->latest()->get();
                $nine = App\Models\News::where('show_at_nine', '1')->latest()->get();
                $category  = App\Models\News::where('category_id', '!=', 'category_id')->get();
                $subcategory  = App\Models\News::where('subcategory_id', '!=', 'subcategory_id')->get();

            @endphp
            <div class="row">
                <div class="col-lg-2">
                    <div class="widget-rounded-circle card  btn-soft-success waves-effect waves-light">
                        <div class="card-body">
                            <ul class=" list-inline">
                                <li class=" list-inline-item">
                                    <h5 class=" d-inline-block">Breaking News</h5>
                                </li>
                                <li class=" list-inline-item"><button
                                        class="d-inline-block btn btn-success">{{ count($breaking) }}</button>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>

                <div class="col-lg-2">
                    <div class="widget-rounded-circle card  btn-soft-success waves-effect waves-light">
                        <div class="card-body">
                            <ul class=" list-inline">
                                <li class=" list-inline-item">
                                    <h5 class=" d-inline-block">Slider News</h5>
                                </li>
                                <li class=" list-inline-item"><button
                                        class="d-inline-block btn btn-warning">{{ count($slider) }}</button>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>

                <div class="col-lg-2">
                    <div class="widget-rounded-circle card  btn-soft-success waves-effect waves-light">
                        <div class="card-body">
                            <ul class=" list-inline">
                                <li class=" list-inline-item">
                                    <h5 class=" d-inline-block">Three News</h5>
                                </li>
                                <li class=" list-inline-item"><button
                                        class="d-inline-block btn btn-pink">{{ count($three) }}</button>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>

                <div class="col-lg-2">
                    <div class="widget-rounded-circle card  btn-soft-success waves-effect waves-light">
                        <div class="card-body">
                            <ul class=" list-inline">
                                <li class=" list-inline-item">
                                    <h5 class=" d-inline-block">Nine &nbsp; News</h5>
                                </li>
                                <li class=" list-inline-item"><button
                                        class="d-inline-block btn btn-info">{{ count($nine) }}</button>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>

                <div class="col-lg-2">
                    <div class="widget-rounded-circle card  btn-soft-success waves-effect waves-light">
                        <div class="card-body">
                            <ul class=" list-inline">
                                <li class=" list-inline-item">
                                    <h5 class=" d-inline-block">Cateory News</h5>
                                </li>
                                <li class=" list-inline-item"><button
                                        class="d-inline-block btn btn-dark">{{ count($category) }}</button>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>

                <div class="col-lg-2">
                    <div class="widget-rounded-circle card  btn-soft-success waves-effect waves-light">
                        <div class="card-body">
                            <ul class=" list-inline">
                                <li class=" list-inline-item">
                                    <h5 class=" d-inline-block">Subcateory News</h5>
                                </li>
                                <li class=" list-inline-item"><button
                                        class="d-inline-block btn btn-danger">{{ count($subcategory) }}</button>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>


            </div>



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('news.create') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add News
                            </a>
                            <h4 class="header-title mb-4">All News List</h4>

                            <div class="table-responsive">
                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100"
                                    id="tickets-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #SI
                                            </th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($allnews as $item)
                                            <tr>
                                                <td><b>#{{ $loop->index + 1 }}</b></td>
                                                <td>
                                                    {{ Str::limit($item->title_en, '30', '') }}
                                                </td>

                                                <td>
                                                    {{ $item->categories->category_name_en }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" class=" img-fluid img-thumbnail"
                                                        style="height: 50px;width:50px;" alt="">
                                                </td>
                                                <td>
                                                    @if ($item->users->image)
                                                        <a href="javascript: void(0);" class="text-body">
                                                            <img src="{{ asset($item->users->image) }}"
                                                                alt="{{ $item->users->email }}"
                                                                title="{{ $item->users->email }}"
                                                                class="rounded-circle avatar-xs">
                                                            <span class="ms-2">{{ $item->users->name }}</span>
                                                        </a>
                                                    @else
                                                        <a href="javascript: void(0);" class="text-body">
                                                            <img src="{{ asset('upload/no_image.jpg') }}"
                                                                alt="{{ $item->users->email }}"
                                                                title="{{ $item->users->email }}"
                                                                class="rounded-circle avatar-xs">
                                                            <span class="ms-2">{{ $item->users->name }}</span>
                                                        </a>
                                                    @endif

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
                                                    <a href="{{ route('news.edit', $item->id) }}" title="edit news"
                                                        class="btn btn-primary  waves-effect waves-light">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    {{-- <a href="{{ route('subcategory.edit', $item->id) }}" title="view news"
                                                        class="btn btn-info  waves-effect waves-light">
                                                        <i class="far fa-eye"></i>
                                                    </a> --}}

                                                    @if ($item->status == '1')
                                                        <a href="{{ route('change.news.status', $item->id) }}"
                                                            title="inactive news"
                                                            class="btn btn-warning  waves-effect waves-light text-white">
                                                            <i class="fas fa-thumbs-down"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('change.news.status', $item->id) }}"
                                                            title="active news"
                                                            class="btn btn-primary  waves-effect waves-light">
                                                            <i class=" fas fa-thumbs-up"></i>
                                                        </a>
                                                    @endif

                                                    <form action="{{ route('news.destroy', $item->id) }}" method="post"
                                                        class=" d-inline">
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
