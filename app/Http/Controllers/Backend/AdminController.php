<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  /**
   * show all admin account
   */
  public function index()
  {
    $alladminaccounts = User::where('role', 'admin')->latest()->paginate(6);
    $total = User::where('role', 'admin')->count();
    return view('backend.pages.adminaccounts.index', compact('alladminaccounts', 'total'));
  } //end method

  /**
   * create admin account
   */
  public function create()
  {
    $allrole = Role::all();
    return view('backend.pages.adminaccounts.create', compact('allrole'));
  } //end method

  /**
   * store admin account
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:100',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|max:100|min:6',
      'role_id' => 'required',
    ]);
    // store image path
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      $url = "upload/adminaccount/" . $name;
      $image->move(public_path("upload/adminaccount/"), $name);
    }

    // crate account
    $admin = new User();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->username = $request->username;
    $admin->phone = $request->phone;
    $admin->password = Hash::make($request->password);
    $admin->image = $url;
    $admin->role = 'admin';
    $admin->status = 'inactive';
    $admin->save();

    if ($request->role_id) {
      $admin->assignRole($request->role_id);
    }


    Toastr::success("congratulations!! Account Created Succes");
    return redirect()->back();
  } //end method


  /**
   * delete admin account
   */
  public function status(Request $request, $id)
  {
    $admin = User::where('id', $id)->first();
    if ($admin->status == 'active') {
      $admin->update([
        'status' => 'inactive',
      ]);
      Toastr::warning("Account Inactive Succes");
      return redirect()->back();
    } else {
      $admin->update([
        'status' => 'active',
      ]);
      Toastr::info("Account Active Succes");
      return redirect()->back();
    }
  }

  /**
   * edit admin account
   */
  public function edit($id)
  {
    $admin = User::findOrFail($id);
    $allrole = Role::all();

    return view('backend.pages.adminaccounts.edit', compact('admin', 'allrole'));
  } //end method

  /**
   * edit admin account
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|string|max:100',
      'email' => 'required|email|unique:users,email,' . $id,
      // 'password' => 'required|max:100|min:6',
      // 'confirm_password' => 'same:password'
    ]);
    // store image path
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      $url = "upload/adminaccount/" . $name;
      $image->move(public_path("upload/adminaccount/"), $name);
    }

    // crate account
    $admin = User::where('id', $id)->first();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->username = $request->username;
    $admin->phone = $request->phone;
    $admin->password = Hash::make($request->password);
    $admin->image = $url;
    $admin->role = 'admin';
    $admin->status = 'inactive';
    $admin->save();


    $admin->roles()->detach();
    if ($request->role_id) {
      $admin->assignRole($request->role_id);
    }

    Toastr::success("congratulations!! Account Update Succes");
    return redirect()->route('show.all.admin.account');
  } //end method

  /**
   * delete admin account
   */
  public function delete($id)
  {
    $admin = User::where('id', $id)->first();
    // unlink old uer image
    if ($admin->image) {
      unlink($admin->image);
    }
    $admin->delete();
    Toastr::warning("Account Delete Succes");
    return redirect()->back();
  } //end method
}
