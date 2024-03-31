@extends('backend.layouts.admin-master')
@section('title', 'mange live tv category')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Live Tv </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-lg-8">
                                    @if ($livetv->status == '1')
                                        <marquee behavior="scroll" direction="up">
                                            <h4 class="header-title mb-4 text-primary">Our System Is Detected Live is Active
                                                Now</h4>
                                        </marquee>
                                    @else
                                        <marquee behavior="scroll" direction="left">
                                            <h4 class="header-title mb-4 text-danger">Our System Is Detected Live is
                                                InActive Now</h4>
                                        </marquee>
                                    @endif
                                </div>

                                <div class="col-lg-4">
                                    <div class=" text-end">
                                        @if ($livetv->status == '1')
                                            <a href="{{ route('live.tv.status', $livetv->id) }}"
                                                class="btn btn-soft-danger waves-effect waves-light"
                                                title="click here to inactive live tv">Inactive LiveTv</a>
                                        @else
                                            <a href="{{ route('live.tv.status', $livetv->id) }}"
                                                class="btn btn-soft-info waves-effect waves-light"
                                                title="click here to active live tv">Active LiveTv</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('update.live.tv', $livetv->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="link" class="form-label">Place Your Live Tv Link</label>
                                            <input type="text" id="link" name="link"
                                                class="form-control @error('link')
                                               is-invalid
                                            @enderror"
                                                value="{{ $livetv->link }}" placeholder="link">

                                            @error('link')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                   

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Live Tv Image Thumbnail</label>
                                            <input type="file" id="image" name="image"
                                                class="form-control @error('image')
                                               is-invalid
                                            @enderror">

                                            @error('image')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class=" shadow-lg p-1 d-inline">
                                                    <img src="{{ asset($livetv->image) }}" id="live_tv_image_show"
                                                        class="img-fluid live_tv_image_show" alt=""
                                                        style="height: 120px;width:300px;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class=" btn btn-primary waves-effect waves-light">Update
                                            LivtTv</button>
                                    </div>
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
            $(document).on('change', function(e) {
                live_tv_image_show.src = URL.createObjectURL(e.target.files['0']);
            });
        });
    </script>
@endpush
