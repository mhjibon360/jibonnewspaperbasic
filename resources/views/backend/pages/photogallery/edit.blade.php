@extends('backend.layouts.admin-master')
@section('title', 'edit photo in gallery')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <style>
        .new-image-design {
            border: 4px dashed #000000;
            text-align: center;
            position: relative;
            border-radius: 10px;
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

                        <h4 class="page-title">Photogallery </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('photogallery.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All photogallery
                            </a>
                            <h4 class="header-title mb-4">Edit Photo in galllery</h4>

                            <form method="POST" action="{{ route('photogallery.update', $gallery->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Photo Gallery
                                                Thumbnail</label>
                                            <input type="file"
                                                class=" form-control @error('image')
                                              is-invalid
                                            @enderror"
                                                id="image" name="image[]" multiple>
                                            @error('image')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" new-image-design shadow p-1"
                                            style="width: 100%;height:200px;overflow:hidden;">

                                            <img src="{{ asset($gallery->image) }}" id="img_show"
                                                class=" img-fluid img-thumbnail img_show" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class=" btn btn-info waves-effect waves-light">Update
                                        New Imagegallery</button>
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
