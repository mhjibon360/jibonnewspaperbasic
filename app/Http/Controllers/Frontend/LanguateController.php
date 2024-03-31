<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguateController extends Controller
{
  /**
   * set languatge english
   */
  public function english()
  {
    session()->get('language');
    session()->forget('language');
    Session::put('language', 'english');
    return redirect()->back();
  }


  /**
   * set languatge bangla
   */
  public function bangla()
  {
    session()->get('language');
    session()->forget('language');
    Session::put('language', 'bangla');
    return redirect()->back();
  }
}
