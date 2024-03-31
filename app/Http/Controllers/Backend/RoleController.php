<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $allrole = Role::all();
    return view('backend.pages.role.index', compact('allrole'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.pages.role.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // validate role data
    $request->validate([
      'name' => 'required|string|unique:roles,name',
    ]);

    // inert role
    Role::create([
      'name' => $request->name,
    ]);

    Toastr::success("Congratulations Role Created Success");
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
    return view('backend.pages.role.edit', compact('role'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // validate role data
    $request->validate([
      'name' => 'required|string|unique:roles,name,' . $id,
    ]);

    // inert role
    Role::where('id', $id)->update([
      'name' => $request->name,
      'updated_at' => Carbon::now(),
    ]);

    Toastr::success("Congratulations Role Update Success");
    return redirect()->route('role.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Role::where('id', $id)->delete();
    Toastr::warning("Congratulations Role Deleted Success");
    return redirect()->back();
  }
}
