@extends('backend.layouts.admin-master')
@section('title', 'edit category')
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
                        <h4 class="page-title">Category </h4>
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
                            <a href="{{ route('category.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All Category
                            </a>
                            <h4 class="header-title mb-4">Edit Category</h4>

                            <form method="POST" action="{{ route('category.update', $category->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_name_en" class="form-label">Category Name English</label>
                                            <input type="text" id="category_name_en" name="category_name_en"
                                                class="form-control @error('category_name_en')
                                               is-invalid
                                            @enderror"
                                                value="{{ $category->category_name_en }}" placeholder="english">

                                            @error('category_name_en')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category_name_bn" class="form-label">Category Name Bangla</label>
                                            <input type="text" id="category_name_bn" name="category_name_bn"
                                                class="form-control  @error('category_name_bn')
                                                is-invalid
                                             @enderror"
                                                value="{{ $category->category_name_bn }}" placeholder="bangla">
                                            @error('category_name_bn')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class=" btn btn-info waves-effect waves-light">Update
                                            Category</button>
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
