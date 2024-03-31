@extends('backend.layouts.admin-master')
@section('title', 'create video in gallery')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <style>
        .new-image-design {
            border: 2px dashed #000000;
            text-align: center;
            position: relative;
            border-radius: 10px;
            background: url('https://miro.medium.com/v2/resize:fit:640/format:webp/1*C5oq4FeTlcpNXrXfnPpxTQ.gif');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .image-box-wrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 100%;
            widows: 100%;
            background: #fff;
        }

        .image-box-wrapper h4 {
            font-size: 22px;
            font-weight: bold;
        }
    </style>
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">videogallery </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('videogallery.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All videogallery
                            </a>
                            <h4 class="header-title mb-4">Create New video galllery post</h4>

                            <form method="POST" action="{{ route('videogallery.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title_en" class="form-label"> Video Title English</label>
                                            <input type="text"
                                                class=" form-control @error('title_en')
                                        is-invalid
                                      @enderror"
                                                id="title_en" name="title_en" value="{{ old('title_en') }}">
                                            @error('title_en')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title_bn" class="form-label"> Video Title Bangla</label>
                                            <input type="text"
                                                class=" form-control @error('title_bn')
                                        is-invalid
                                      @enderror"
                                                id="title_bn" name="title_bn" value="{{ old('title_bn') }}">
                                            @error('title_bn')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!--end col-->
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="link" class="form-label"> Video Link</label>
                                            <input type="text"
                                                class=" form-control @error('link')
                                        is-invalid
                                      @enderror"
                                                id="link" name="link" value="{{ old('link') }}">
                                            @error('link')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!--end col-->

                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">>Photo Gallery
                                                Thumbnail</label>
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
                                    <div class="col-lg-12">
                                        <div class=" new-image-design shadow"
                                            style="width: 100%;height:200px;overflow:hidden;">

                                            <img src="" id="img_show" class=" img-fluid img_show" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class=" btn btn-success waves-effect waves-light">Create Viewo Gallery</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>

        </div> <!-- container -->



    </div> <!-- container -->


@endsection
@push('script-file')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#image', function(e) {
                img_show.src = URL.createObjectURL(e.target.files['0']);
            });
        });
    </script>
@endpush
