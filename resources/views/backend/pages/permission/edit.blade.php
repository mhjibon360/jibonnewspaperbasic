@extends('backend.layouts.admin-master')
@section('title', 'edit permission')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Permissions </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('permission.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All Permissions
                            </a>
                            <h4 class="header-title mb-4">Edit Permissions</h4>

                            <form method="POST" action="{{ route('permission.update', $permission->id) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="group_name" class="form-label">Permissions Group Name</label>
                                            <input type="text" id="group_name" name="group_name"
                                                class="form-control @error('group_name')
                                               is-invalid
                                            @enderror"
                                                value="{{ $permission->group_name }}" placeholder="group name">

                                            @error('group_name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="name" class="form-label">Permissions Name</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name')
                                               is-invalid
                                            @enderror"
                                                value="{{ $permission->name }}" placeholder="name">

                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <button type="submit" class=" btn btn-info waves-effect waves-light">Update
                                        Permissions</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>

        </div> <!-- container -->



    </div> <!-- container -->
@endsection
