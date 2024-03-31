<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolepermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $allrole = Role::all();
    return view('backend.pages.role_has_permission.index', compact('allrole'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $allrole = Role::all();
    $allpermission = Permission::all();
    $getpermission_groups = User::getpermissionGroups();
    return view('backend.pages.role_has_permission.create', compact('allrole', 'allpermission', 'getpermission_groups'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = [];
    $role = $request->role_id;
    $permissions = $request->permission_id;
    foreach ($permissions as $key => $permission) {
      $data['role_id'] = $role;
      $data['permission_id'] = $permission;
      DB::table('role_has_permissions')->insert($data);
    }
    Toastr::success("Role in Permission Added Success");
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $role = Role::findOrFail($id);
    $allpermission = Permission::all();
    $getpermission_groups = User::getpermissionGroups();
    return view('backend.pages.role_has_permission.edit', compact('role', 'allpermission', 'getpermission_groups'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $role = Role::findOrFail($id);
    $permissions = $request->permission_id;
    if (!empty($request->permission_id)) {
      $role->syncPermissions($permissions);
    }

    Toastr::info("Role in Permission Updated Success");
    return redirect()->route('role-has-permission.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Role::where('id', $id)->delete();
    Toastr::warning("Role in Permission Delete Success");
    return redirect()->route('role-has-permission.index');
  }
}
