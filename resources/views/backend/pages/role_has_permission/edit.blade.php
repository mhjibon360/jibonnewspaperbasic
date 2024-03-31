@extends('backend.layouts.admin-master')
@section('title', 'edit role has permission')
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

                        <h4 class="page-title">Role-Has-Permission </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('role-has-permission.index') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-format-list-bulleted-square"></i> All Role-Has-Permission
                            </a>
                            <h4 class="header-title mb-4">Edit Role-Permission</h4>

                            <form method="POST" action="{{ route('role-has-permission.update', $role->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4 class=" fs-4 fw-semibold text-warning">{{ $role->name }}</h4>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="all_permissions">
                                            <label class="form-check-label" for="all_permissions">All Permissions</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                @foreach ($getpermission_groups as $group)
                                    <div class="row">
                                        <div class="col-lg-3">
                                            @php
                                                $permissions = App\Models\User::getpermissionbyGroupsName(
                                                    $group->group_name,
                                                );
                                            @endphp
                                            <div class="form-check mb-2 form-check-primary">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="group_name{{ $group->group_name }}"
                                                    {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="group_name{{ $group->group_name }}">{{ $group->group_name }}</label>
                                            </div>
                                        </div>




                                        <div class="col-lg-9">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check mb-2 form-check-primary">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $permission->name }}"
                                                        id="permission_id{{ $permission->id }}" name="permission_id[]"
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="permission_id{{ $permission->id }}">{{ ucfirst($permission->name) }}</label>
                                                </div>
                                            @endforeach
                                            <hr>
                                        </div>

                                    </div>
                                @endforeach

                                <div class="">
                                    <button type="submit" class=" btn btn-success waves-effect waves-light">Update
                                        Role Has permission</button>
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

    <script>
        $(document).ready(function() {
            $(document).on('click', '#all_permissions', function() {
                if ($(this).is(':checked')) {
                    $('input[type=checkbox]').prop('checked', true);
                } else {
                    $('input[type=checkbox]').prop('checked', false);

                }
            });
        });
    </script>
@endpush
