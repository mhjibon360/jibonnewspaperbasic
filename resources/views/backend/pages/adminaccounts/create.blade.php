@extends('backend.layouts.admin-master')
@section('title', 'create new admin accounts')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @push('style-file')
        <link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    @endpush

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        {{-- <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href=""> <i class=" fas fa-list"></i> All</a></li>
                              
                            </ol>
                        </div> --}}
                        <h4 class="page-title">News-post </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('show.all.admin.account') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All News
                            </a>
                            <h4 class="header-title mb-4">Create New News Post</h4>

                            <form method="POST" action="{{ route('store.admin.account') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Admin Name</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name')
                                               is-invalid
                                            @enderror"
                                                value="{{ old('name') }}" placeholder="name">

                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Admin E-mail</label>
                                            <input type="text" id="email" name="email"
                                                class="form-control @error('email')
                                               is-invalid
                                            @enderror"
                                                value="{{ old('email') }}" placeholder="email">
                                            @error('email')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Admin Username</label>
                                            <input type="text" id="username" name="username"
                                                class="form-control @error('username')
                                               is-invalid
                                            @enderror"
                                                value="{{ old('username') }}" placeholder="username">
                                            @error('username')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Admin PhneNumber</label>
                                            <input type="text" id="phone" name="phone"
                                                class="form-control @error('phone')
                                               is-invalid
                                            @enderror"
                                                value="{{ old('phone') }}" placeholder="phone">
                                            @error('phone')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Admin Account Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password')
                                               is-invalid
                                            @enderror"
                                                value="" placeholder="password">
                                            @error('password')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="role_id" class="form-label">Select Role</label>


                                            <select name="role_id" id="role_id"
                                                class=" form-control @error('role_id')
                                              is-invalid
                                           @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select role--</option>
                                                @foreach ($allrole as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('role_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">
                                                Admin Photo
                                            </label>
                                            <input type="file"
                                                class=" form-control @error('image')
                                              is-invalid
                                            @enderror"
                                                id="image" name="image">
                                            @error('image')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <img src="{{ asset('upload/no_image.jpg') }}"
                                                class="show_image img-fluid img-thumbnail shadow" id="show_image"
                                                alt="" style="height: 100px;width:100px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class=" btn btn-success waves-effect waves-light">Create
                                        Admin Account</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>

        </div> <!-- container -->



    </div> <!-- container -->


    <script>
        $(document).ready(function() {
            $(document).on('change', '#image', function(e) {
                show_image.src = URL.createObjectURL(e.target.files['0']);
            });
        });
    </script>
@endsection

@push('script-file')
    <link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />

    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>
@endpush
