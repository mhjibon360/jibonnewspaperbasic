@extends('backend.layouts.admin-master')
@section('title', 'edit subcategory')
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
                        {{-- <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href=""> <i class=" fas fa-list"></i> All</a></li>
                              
                            </ol>
                        </div> --}}
                        <h4 class="page-title">subCategory </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i> Add Ticket
                            </button> --}}
                            <a href="{{ route('subcategory.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All SubCategory
                            </a>
                            <h4 class="header-title mb-4">Edit SubCategory</h4>

                            <form method="POST" action="{{ route('subcategory.update', $subcategory->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
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
                                                        {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                                                        {{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('category_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subcategory_name_en" class="form-label">SubCategory Name
                                                English</label>
                                            <input type="text" id="subcategory_name_en" name="subcategory_name_en"
                                                class="form-control @error('subcategory_name_en')
                                               is-invalid
                                            @enderror"
                                                value="{{ $subcategory->subcategory_name_en }}" placeholder="english">

                                            @error('subcategory_name_en')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subcategory_name_bn" class="form-label">SubCategory Name
                                                Bangla</label>
                                            <input type="text" id="subcategory_name_bn" name="subcategory_name_bn"
                                                class="form-control  @error('subcategory_name_bn')
                                                is-invalid
                                             @enderror"
                                                value="{{ $subcategory->subcategory_name_bn }}" placeholder="bangla">
                                            @error('subcategory_name_bn')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class=" btn btn-info waves-effect waves-light">Update
                                            Subcategory</button>
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
