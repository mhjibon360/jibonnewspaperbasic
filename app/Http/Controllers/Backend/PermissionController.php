<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $allpermission = Permission::all();
    return view('backend.pages.permission.index', compact('allpermission'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.pages.permission.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // validate role data
    $request->validate([
      'group_name' => 'required',
      'name' => 'required|string|unique:roles,name',
    ]);

    // inert role
    Permission::create([
      'name' => $request->name,
      'group_name' => $request->group_name,
    ]);

    Toastr::success("Congratulations Permissions Created Success");
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
    $permission = Permission::findOrFail($id);
    return view('backend.pages.permission.edit', compact('permission'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // validate role data
    $request->validate([
      'group_name' => 'required',
      'name' => 'required|string|unique:roles,name',
    ]);

    // inert role
    Permission::where('id', $id)->update([
      'name' => $request->name,
      'group_name' => $request->group_name,
    ]);

    Toastr::info("Congratulations Permissions Update Success");
    return redirect()->route('permission.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Permission::where('id', $id)->delete();
    Toastr::warning("Congratulations Permissions Deleted Success");
    return redirect()->back();
  }
}
