<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminaccountController extends Controller
{
  /**
   * admin edit proflie page show
   */
  public function editprofile()
  {
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();
    return view('backend.pages.admin-profile.edit-profile', compact('admin'));
  } // end method

  /**
   * update admin proflie
   */
  public function updateprofile(Request $request, $id)
  {
    if ($request->hasFile('image')) {
      // validate some necessary data
      $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,' . $id],
        'username' => ['nullable', 'string', 'max:100', 'unique:users,username,' . $id],
        'phone' => ['nullable', 'string', 'max:100', 'unique:users,username,' . $id],
        'image' => ['required',],
      ]);

      // stoer profil image path
      $image = $request->file('image');
      $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      $url = 'upload/adminprofile/' . $name;
      $image->move(public_path('upload/adminprofile/'), $name);

      //unlink old image
      $admin = User::findOrFail($id);
      if ($admin->image) {
        unlink($admin->image);
      }
      // update admin informations
      User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'username' => $request->username,
        'phone' => $request->phone,
        'image' => $url,
        'details' => $request->details,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'youtube' => $request->youtube,
        'github' => $request->github,
        'updated_at' => Carbon::now(),
      ]);
      Toastr::info("Proflile Updated Success");
      return redirect()->back();
    } else {
      // validate some necessary data
      $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,' . $id],
        'username' => ['nullable', 'string', 'max:100', 'unique:users,username,' . $id],
        'phone' => ['nullable', 'string', 'max:100', 'unique:users,username,' . $id],
        'image' => ['nullable',],
      ]);

      // update admin informations
      User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'username' => $request->username,
        'phone' => $request->phone,
        'details' => $request->details,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'youtube' => $request->youtube,
        'github' => $request->github,
        'updated_at' => Carbon::now(),
      ]);
      Toastr::info("Proflile Updated Success");
      return redirect()->back();
    }
  } // end method

  /**
   * admin update password
   */

  public function updatepassword(Request $request, $id)
  {
    $request->validate([
      'password' => ['required', 'min:6'],
      'new_password' => ['required', 'min:6'],
      'confirm_password' => ['same:new_password']
    ]);

    // check current password 
    if (Hash::check($request->password, Auth::user()->password)) {
      User::where('id', $id)->update([
        'password' => Hash::make($request->new_password),
      ]);
      Toastr::info("Password Change Success");
      return redirect()->back();
    } else {
      Toastr::error("Current Password Does't match");
      return redirect()->back();
    }
  } // end method
}
