@extends('backend.layouts.admin-master')
@section('title', 'create new category dashboard')
@section('content')
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
                        <h4 class="page-title">Profile </h4>
                    </div>
                </div>
            </div>




            <!-- Start Content-->
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card text-center">
                        <div class="card-body">
                            @if ($admin->image)
                                <img src="{{ asset($admin->image) }}" class="rounded-circle avatar-lg img-thumbnail"
                                    alt="profile-image">
                            @else
                                <img src="{{ asset('backend') }}/assets/images/users/user-1.jpg"
                                    class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                            @endif
                            <h4 class="mb-0">{{ $admin->name }}</h4>
                            <p class="text-muted">@ {{ $admin->username }}</p>

                            <button type="button"
                                class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                            <button type="button"
                                class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">About Me :</h4>
                                <p class="text-muted font-13 mb-3">
                                    {{ $admin->details }}
                                </p>
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                        class="ms-2">{{ $admin->name }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span
                                        class="ms-2">({{ $admin->phone }})
                                        123 1234</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                        class="ms-2">{{ $admin->email }}</span></p>


                            </div>

                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="{{ $admin->facebook }}" class="social-list-item border-primary text-primary"><i
                                            class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $admin->instagram }}" class="social-list-item border-danger text-danger"><i
                                            class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $admin->twitter }}" class="social-list-item border-info text-info"><i
                                            class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $admin->github }}"
                                        class="social-list-item border-secondary text-secondary"><i
                                            class="mdi mdi-github"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $admin->youtube }}" class="social-list-item border-danger text-danger"><i
                                            class="mdi mdi-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end card -->



                </div> <!-- end col-->


                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-fill navtab-bg">
                                <li class="nav-item">
                                    <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                        Proflle
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                        Password
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="settings">
                                    <form action="{{ route('update.admin.profile', $admin->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>
                                            Personal Info</h5>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Full Name
                                                    </label>
                                                    <input type="text" id="name" name="name"
                                                        class="form-control @error('name')
                                                   is-invalid
                                                @enderror"
                                                        value="{{ $admin->name }}">

                                                    @error('name')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Userusername
                                                    </label>
                                                    <input type="text" id="username" name="username"
                                                        class="form-control @error('username')
                                                   is-invalid
                                                @enderror"
                                                        value="{{ $admin->username }}">

                                                    @error('username')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->

                                        </div> <!-- end row -->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">E-mail
                                                    </label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control @error('email')
                                               is-invalid
                                            @enderror"
                                                        value="{{ $admin->email }}">

                                                    @error('email')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number
                                                    </label>
                                                    <input type="text" id="phone" name="phone"
                                                        class="form-control @error('phone')
                                                   is-invalid
                                                @enderror"
                                                        value="{{ $admin->phone }}">

                                                    @error('phone')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row align-items-center">
                                            <div class="col-md-9">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label image">Choose Profile Photo
                                                    </label>
                                                    <input type="file" id="image" name="image"
                                                        class="form-control image @error('image')
                                                        is-invalid
                                                     @enderror">
                                                    @error('image')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="shadow p-1 text-center">
                                                    @if ($admin->image)
                                                        <img src="{{ asset($admin->image) }}" id="show_image"
                                                            class=" img-fluid img-thumbnail show_image"
                                                            style="height: 150px;width:150px;" alt="">
                                                    @else
                                                        <img src="{{ asset('upload/no_image.jpg') }}" id="show_image"
                                                            class=" img-fluid img-thumbnail show_image"
                                                            style="height: 150px;width:150px;" alt="">
                                                    @endif
                                                </div>
                                            </div> <!-- end col -->
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="details" class="form-label">Bio</label>
                                                    <textarea name="details" class="form-control" id="details" rows="4" placeholder="Write something...">{{ $admin->details }}</textarea>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->





                                        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i>
                                            Social</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="facebook" class="form-label">Facebook</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-facebook-square"></i></span>
                                                        <input type="text" class="form-control" id="facebook"
                                                            name="facebook" value="{{ $admin->facebook }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="twitter" class="form-label">Twitter</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-twitter"></i></span>
                                                        <input type="text" name="twitter" class="form-control"
                                                            id="twitter" value="{{ $admin->facebook }}">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="instagram" class="form-label">Instagram</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-instagram"></i></span>
                                                        <input type="text" name="instagram" class="form-control"
                                                            id="instagram" value="{{ $admin->instagram }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="youtube" class="form-label">Youtube</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-youtube"></i></span>
                                                        <input type="text" name="youtube" class="form-control"
                                                            id="youtube" value="{{ $admin->youtube }}">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="github" class="form-label">Github</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-github"></i></span>
                                                        <input type="text" name="github" class="form-control"
                                                            id="github" value="{{ $admin->github }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div> <!-- end row -->

                                        <div class="text-start">
                                            <button type="submit"
                                                class="btn btn-success waves-effect waves-light mt-2"><i
                                                    class="mdi mdi-content-save"></i> Save Profile</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end settings content-->

                                <!-- end about me section content -->

                                <div class="tab-pane show " id="timeline">


                                    <form action="{{ route('update.admin.password', $admin->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-key-outline me-1"></i>
                                            change &nbsp; Password</h5>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password
                                                    </label>
                                                    <input type="password" name="password" id="password" password="password"
                                                        class="form-control @error('password')
                                               is-invalid
                                            @enderror"
                                                        value="">

                                                    @error('password')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="new_password" class="form-label">New password
                                                    </label>
                                                    <input type="password" id="new_password" name="new_password"
                                                        class="form-control @error('new_password')
                                               is-invalid
                                            @enderror"
                                                        value="">

                                                    @error('new_password')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="confirm_password" class="form-label">Confirm password
                                                    </label>
                                                    <input type="password" id="confirm_password" name="confirm_password"
                                                        class="form-control @error('confirm_password')
                                               is-invalid
                                            @enderror"
                                                        value="">

                                                    @error('confirm_password')
                                                        <span class=" text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->

                                        </div> <!-- end row -->




                                        <div class="text-start">
                                            <button type="submit" class="btn btn-danger waves-effect waves-light mt-2"><i
                                                    class="mdi mdi-content-save"></i> Update Password</button>
                                        </div>
                                    </form>


                                </div>
                                <!-- end timeline content-->



                            </div> <!-- end tab-content -->
                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->





        </div> <!-- container -->



    </div> <!-- container -->
@endsection
@push('script-file')
    <script>
        $(document).ready(function() {
            $(document).on('change', '.image', function(e) {
                show_image.src = URL.createObjectURL(e.target.files['0']);
            });
        });
    </script>
@endpush
