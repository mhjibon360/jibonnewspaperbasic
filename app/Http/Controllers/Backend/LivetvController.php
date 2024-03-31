<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Livetv;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LivetvController extends Controller
{
  /**
   * mange live page show
   */
  public function mangaelivetv()
  {
    $livetv = Livetv::first();
    return view('backend.pages.livetv.live-tv', compact('livetv'));
  } //END METHOD

  /**
   * mange live page show
   */
  public function updatelivetv(Request $request, $id)
  {
    $livetv = Livetv::where('id', $id)->first();

    if ($request->file('image')) {
      $request->validate([
        'image' => ['required'],
        'link' => ['required'],
      ]);

      // store image path
      $image = $request->file('image');
      $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      $url = "upload/livetv/" . $name;
      $image->move(public_path("upload/livetv/"), $name);

      // unlink old live thumanil
      if ($livetv->image) {
        unlink($livetv->image);
      }

      $livetv->update([
        'image' => $url,
        'link' => $request->link,
        'updated_at' => Carbon::now(),
      ]);
      Toastr::info("Live Tv Updated success");
      return redirect()->back();
    } else {
      $request->validate([
        'image' => ['nullable'],
        'link' => ['required'],
      ]);


      $livetv->update([
        'link' => $request->link,
        'updated_at' => Carbon::now(),
      ]);
      Toastr::info("Live Tv Updated success");
      return redirect()->back();
    }
  } //END METHOD

  /**
   * mange live page show
   */
  public function status($id)
  {
    $livetv = Livetv::where('id', $id)->first();
    if ($livetv->status == '1') {
      $livetv->update([
        'status' => 0
      ]);
      Toastr::warning("system detect live tv inactive success");
      return redirect()->back();
    } else {
      $livetv->update([
        'status' => 1
      ]);
      Toastr::info("system detect live tv active success");
      return redirect()->back();
    }
  } //END METHOD
}
