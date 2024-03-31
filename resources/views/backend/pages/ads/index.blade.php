@extends('backend.layouts.admin-master')
@section('title', 'manage all advertisement')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Advertisement </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- <a href="{{ route('category.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All Advertisement
                            </a> --}}
                            <h4 class="header-title mb-4">Manage Advertisement</h4>

                            <form method="POST" action="{{ route('update.ads', $ads->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="one" class="form-label">Home Page Advertisement One</label>
                                            <input type="file" id="one" name="one" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->one) }}" class="one_show img-fluid" id="one_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="two" class="form-label">Home Page Advertisement Two</label>
                                            <input type="file" id="two" name="two" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->two) }}" class="two_show img-fluid" id="two_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="three" class="form-label">Home Page Advertisement Three</label>
                                            <input type="file" id="three" name="three" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->three) }}" class="three_show img-fluid" id="three_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="four" class="form-label">Home Page Advertisement Four</label>
                                            <input type="file" id="four" name="four" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->four) }}" class="four_show img-fluid" id="four_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="five" class="form-label">Home Page Advertisement Five</label>
                                            <input type="file" id="five" name="five" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->five) }}" class="five_show img-fluid" id="five_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="six" class="form-label">Home Page Advertisement Six</label>
                                            <input type="file" id="six" name="six" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->six) }}" class="six_show img-fluid" id="six_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="seven" class="form-label">Home Page Advertisement Seven</label>
                                            <input type="file" id="seven" name="seven" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->sevent) }}" class="seven_show img-fluid" id="seven_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="eight" class="form-label">Home Page Advertisement Eight</label>
                                            <input type="file" id="eight" name="eight" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->eight) }}" class="eight_show img-fluid" id="eight_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="nine" class="form-label">Home Page Advertisement Nine</label>
                                            <input type="file" id="nine" name="nine" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->nine) }}" class="nine_show img-fluid" id="nine_show"
                                            alt="">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="ten" class="form-label">Home Page Advertisement Ten</label>
                                            <input type="file" id="ten" name="ten" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ asset($ads->ten) }}" class="ten_show img-fluid" id="ten_show"
                                            alt="">
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <button type="submit" class=" btn btn-success waves-effect waves-light">Update
                                        Advertisement</button>
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
            $(document).on('change', '#one', function(e) {
                one_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 
            $(document).on('change', '#two', function(e) {
                two_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 
            $(document).on('change', '#three', function(e) {
                three_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#four', function(e) {
                four_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#five', function(e) {
                five_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#six', function(e) {
                six_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#seven', function(e) {
                seven_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#eight', function(e) {
                eight_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#nine', function(e) {
                nine_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#ten', function(e) {
                ten_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#eleven', function(e) {
                eleven_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#twelve', function(e) {
                twelve_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#thirteen', function(e) {
                thirteen_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 

            $(document).on('change', '#fourteen', function(e) {
                fourteen_show.src = URL.createObjectURL(e.target.files['0']);
            }); //end 


        });
    </script>
@endpush
