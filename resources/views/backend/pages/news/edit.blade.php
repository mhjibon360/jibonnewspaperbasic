@extends('backend.layouts.admin-master')
@section('title', 'edit news')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @push('style-file')
        <link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    @endpush
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

                            <a href="{{ route('news.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All News
                            </a>
                            <h4 class="header-title mb-4">Edit News Post</h4>

                            <form method="POST" action="{{ route('news.update', $news->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Select Category</label>
                                            <select name="category_id" id="category_id"
                                                class=" form-control @error('subcategory_name_en')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select category--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $news->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('category_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subcategory_id" class="form-label">Select Sbcategory</label>
                                            <select name="subcategory_id" id="subcategory_id"
                                                class=" form-control @error('subcategory_name_en')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select category--</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ $news->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->subcategory_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('subcategory_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title_en" class="form-label">News Title
                                                English</label>
                                            <input type="text" id="title_en" name="title_en"
                                                class="form-control @error('title_en')
                                               is-invalid
                                            @enderror"
                                                value="{{ $news->title_en }}" placeholder="english">

                                            @error('title_en')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title_bn" class="form-label">News Title
                                                Bangla</label>
                                            <input type="text" id="title_bn" name="title_bn"
                                                class="form-control  @error('title_bn')
                                                is-invalid
                                             @enderror"
                                                value="{{ $news->title_bn }}" placeholder="bangla">
                                            @error('title_bn')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">


                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tags_en" class="form-label">News Tags
                                                English</label>
                                            <br>
                                            <input type="text"
                                                class=" form-control w-100 @error('tags_en')
                                              is-invalid
                                            @enderror"
                                                id="tags_en" name="tags_en" value="{{ $news->tags_en }}"
                                                data-role="tagsinput">

                                            @error('tags_en')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tags_bn" class="form-label">News Tags
                                                Bangla</label>
                                            <br>
                                            <input type="text"
                                                class=" form-control w-100 @error('tags_bn')
                                              is-invalid
                                            @enderror"
                                                id="tags_bn" name="tags_bn" value="{{ $news->tags_bn }}"
                                                data-role="tagsinput">

                                            @error('tags_bn')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>

                                <div class="row">


                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="details_en" class="form-label">News Details
                                                English</label>
                                            <textarea name="details_en" id="details_en"
                                                class=" form-control @error('details_en')
                                         
                                       @enderror"
                                                id="details_en" rows="4">{{ $news->details_en }}</textarea>
                                            @error('details_en')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="details_bn" class="form-label">News Details
                                                Bangla</label>
                                            <textarea name="details_bn" id="details_bn"
                                                class=" form-control @error('details_bn')
                                         
                                       @enderror"
                                                id="details_bn" rows="4">{{ $news->details_bn }}</textarea>
                                            @error('details_bn')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">News 
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
                                    <div class="col-lg-6">
                                        <div class=" new-image-design shadow p-1"
                                            style="width: 100%;height:200px;overflow:hidden;">

                                            <img src="{{ asset($news->image) }}" id="img_show"
                                                class=" img-fluid img-thumbnail img_show" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2 form-check-pink">
                                            <input class="form-check-input" name="show_at_breaking" type="checkbox"
                                                value="1" id="show_at_breaking" {{ $news->show_at_breaking=='1'?'checked':'' }}>
                                            <label class="form-check-label" for="show_at_breaking">Show At
                                                Breaking</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" name="show_at_slider" type="checkbox"
                                                value="1" id="show_at_slider" {{ $news->show_at_slider=='1'?'checked':'' }}>
                                            <label class="form-check-label" for="show_at_slider">Show At Slider</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2 form-check-info">
                                            <input class="form-check-input" name="show_at_three" type="checkbox"
                                                value="1" id="show_at_three" {{ $news->show_at_three=='1'?'checked':'' }}>
                                            <label class="form-check-label" for="show_at_three">Show At Three</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2 form-check-danger">
                                            <input class="form-check-input" name="show_at_nine" type="checkbox"
                                                value="1" id="show_at_nine" {{ $news->show_at_nine=='1'?'checked':'' }}>
                                            <label class="form-check-label" for="show_at_nine">Show At Nine</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class=" btn btn-info waves-effect waves-light">Update
                                        News</button>
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
            $(document).on('change', '#category_id', function(e) {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('select.subcategory') }}",
                    type: "GET",
                    data: {
                        category_id: category_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        var html = '<option value="">select subcategory</option>';
                        $.each(response, function(key, value) {
                            html += '<option value="' + value.id + '">' + value
                                .subcategory_name_en + '</option>';
                        });
                        $('#subcategory_id').html(html);
                    }
                });
            });
        });
    </script>
@endsection
@push('script-file')
    <style>
        .bootstrap-tagsinput {


            max-width: 100%;
            cursor: text;
            width: 100%;
        }

        .bootstrap-tagsinput .tag {
            background: #9261C6;
            border: 1px solid #9261C6;
            padding: 5px 6px;
            margin-right: 2px;
            color: white;
            border-radius: 3px;
        }
    </style>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.css"
        integrity="sha512-X6069m1NoT+wlVHgkxeWv/W7YzlrJeUhobSzk4J09CWxlplhUzJbiJVvS9mX1GGVYf5LA3N9yQW5Tgnu9P4C7Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js"
        integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.0/tinymce.min.js"
        integrity="sha512-xEHlM+pBhSw2P/G+5x3BR8723QPEf2bPr4BLV8p8pvtaCHmWVuSzzKy9M0oqWaXDZrB3r2Ntwmc9iJcNV/nfBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: '#details_en'
        });
        tinymce.init({
            selector: '#details_bn'
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('change', '#image', function(e) {
                img_show.src = URL.createObjectURL(e.target.files['0']);
            });
        });
    </script>
@endpush
