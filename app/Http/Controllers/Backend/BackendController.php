<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
  /**
   * admin dashboard 
   */
  public function index()
  {
    return view('backend.pages.dashboard.index');
  } // end method

  /**
   * admin dashboard 
   */
  public function logout(Request $request)
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();
    Toastr::warning("Lgout Success");
    return redirect('/login');
  } // end method
}
