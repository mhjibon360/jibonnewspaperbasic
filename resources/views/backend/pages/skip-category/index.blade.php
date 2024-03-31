@extends('backend.layouts.admin-master')
@section('title', 'category skip to run post')
@section('content')
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
                        <h4 class="page-title">Skipcategory </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('subcategory.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All SubCategory
                            </a>
                            <h4 class="header-title mb-4">Skip category to run news</h4>

                            <form method="POST" action="{{ route('all.news.category.update', $newascat->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_one" class="form-label">Select Section One Category</label>
                                            <select name="category_one" id="category_one"
                                                class=" form-control @error('category_one')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select category--</option>
                                                @foreach ($allcategory as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $newascat->category_one ? 'selected' : '' }}>
                                                        {{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('category_one')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subcategory_six" class="form-label">Select Section One
                                                subCategory</label>
                                            <select name="subcategory_six" id="subcategory_six"
                                                class=" form-control @error('subcategory_six')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select subcategory--</option>
                                                @foreach ($allsubcategory as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ $subcategory->id == $newascat->subcategory_six ? 'selected' : '' }}>
                                                        {{ $subcategory->subcategory_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('subcategory_six')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_two" class="form-label">Select Section Two Category</label>
                                            <select name="category_two" id="category_two"
                                                class=" form-control @error('category_two')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select category--</option>
                                                @foreach ($allcategory as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $newascat->category_two ? 'selected' : '' }}>
                                                        {{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('category_two')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subcategory_seven" class="form-label">Select Section Two
                                                subCategory</label>
                                            <select name="subcategory_seven" id="subcategory_seven"
                                                class=" form-control @error('subcategory_seven')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select subcategory--</option>
                                                @foreach ($allsubcategory as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ $subcategory->id == $newascat->subcategory_seven ? 'selected' : '' }}>
                                                        {{ $subcategory->subcategory_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('subcategory_seven')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_three" class="form-label">Select Section Three
                                                Category</label>
                                            <select name="category_three" id="category_three"
                                                class=" form-control @error('category_three')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select category--</option>
                                                @foreach ($allcategory as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $newascat->category_three ? 'selected' : '' }}>
                                                        {{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('category_three')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subcategory_eight" class="form-label">Select Section Three
                                                subCategory</label>
                                            <select name="subcategory_eight" id="subcategory_eight"
                                                class=" form-control @error('subcategory_eight')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select subcategory--</option>
                                                @foreach ($allsubcategory as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ $subcategory->id == $newascat->subcategory_eight ? 'selected' : '' }}>
                                                        {{ $subcategory->subcategory_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('subcategory_eight')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_four" class="form-label">Select Section Four
                                                Category</label>
                                            <select name="category_four" id="category_four"
                                                class=" form-control @error('category_four')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select category--</option>
                                                @foreach ($allcategory as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $newascat->category_four ? 'selected' : '' }}>
                                                        {{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('category_four')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subcategory_nine" class="form-label">Select Section Four
                                                subCategory</label>
                                            <select name="subcategory_nine" id="subcategory_nine"
                                                class=" form-control @error('subcategory_nine')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select subcategory--</option>
                                                @foreach ($allsubcategory as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ $subcategory->id == $newascat->subcategory_nine ? 'selected' : '' }}>
                                                        {{ $subcategory->subcategory_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('subcategory_nine')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_five" class="form-label">Select Section Five
                                                Category</label>
                                            <select name="category_five" id="category_five"
                                                class=" form-control @error('category_five')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select category--</option>
                                                @foreach ($allcategory as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $newascat->category_five ? 'selected' : '' }}>
                                                        {{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('category_five')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subcategory_ten" class="form-label">Select Section Five
                                                subCategory</label>
                                            <select name="subcategory_ten" id="subcategory_ten"
                                                class=" form-control @error('subcategory_ten')
                                            is-invalid
                                         @enderror"
                                                data-toggle="select2">
                                                <option value="" selected disabled>--select subcategory--</option>
                                                @foreach ($allsubcategory as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ $subcategory->id == $newascat->subcategory_ten ? 'selected' : '' }}>
                                                        {{ $subcategory->subcategory_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('subcategory_ten')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <button type="submit" class=" btn btn-success waves-effect waves-light">Update
                                            Skip category</button>
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
    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>
@endpush
