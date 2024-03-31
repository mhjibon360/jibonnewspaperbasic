@extends('backend.layouts.admin-master')
@section('title', 'Edit role')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Role </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('role.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All Role
                            </a>
                            <h4 class="header-title mb-4">Edit Role</h4>

                            <form method="POST" action="{{ route('role.update', $role->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="name" class="form-label">Role Name</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name')
                                               is-invalid
                                            @enderror"
                                                value="{{ $role->name }}" placeholder="name">

                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <button type="submit" class=" btn btn-info waves-effect waves-light">Update
                                        Role</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>

        </div> <!-- container -->



    </div> <!-- container -->
@endsection
