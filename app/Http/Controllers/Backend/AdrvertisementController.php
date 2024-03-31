<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdrvertisementController extends Controller
{
  /**
   * manage ads method
   */
  public function mangaead()
  {
    $ads = Advertisement::first();
    return view('backend.pages.ads.index', compact('ads'));
  } //end method

  /**
   * manage ads method
   */
  public function updateads(Request $request, $id)
  {
    // return($request->all());
    if ($request->file('one')) {
      $one = $request->file('one');
      $one_name = hexdec(uniqid()) . '.' . $one->getClientOriginalExtension();
      $url_one = "upload/ads/" . $one_name;
      $one->move(public_path("upload/ads/"), $one_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->one) {
        unlink($ads->one);
      }
      $ads->update([
        'one' => $url_one,
      ]);
    } //end one image

    if ($request->file('two')) {
      $two = $request->file('two');
      $two_name = hexdec(uniqid()) . '.' . $two->getClientOriginalExtension();
      $url_two = "upload/ads/" . $two_name;
      $two->move(public_path("upload/ads/"), $two_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->two) {
        unlink($ads->two);
      }
      $ads->update([
        'two' => $url_two,
      ]);
    } //end two image

    if ($request->file('three')) {
      $three = $request->file('three');
      $three_name = hexdec(uniqid()) . '.' . $three->getClientOriginalExtension();
      $url_three = "upload/ads/" . $three_name;
      $three->move(public_path("upload/ads/"), $three_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->three) {
        unlink($ads->three);
      }
      $ads->update([
        'three' => $url_three,
      ]);
    } //end three image

    if ($request->file('four')) {
      $four = $request->file('four');
      $four_name = hexdec(uniqid()) . '.' . $four->getClientOriginalExtension();
      $url_four = "upload/ads/" . $four_name;
      $four->move(public_path("upload/ads/"), $four_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->four) {
        unlink($ads->four);
      }
      $ads->update([
        'four' => $url_four,
      ]);
    } //end four image

    if ($request->file('five')) {
      $five = $request->file('five');
      $five_name = hexdec(uniqid()) . '.' . $five->getClientOriginalExtension();
      $url_five = "upload/ads/" . $five_name;
      $five->move(public_path("upload/ads/"), $five_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->five) {
        unlink($ads->five);
      }
      $ads->update([
        'five' => $url_five,
      ]);
    } //end five image

    if ($request->file('six')) {
      $six = $request->file('six');
      $six_name = hexdec(uniqid()) . '.' . $six->getClientOriginalExtension();
      $url_six = "upload/ads/" . $six_name;
      $six->move(public_path("upload/ads/"), $six_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->six) {
        unlink($ads->six);
      }
      $ads->update([
        'six' => $url_six,
      ]);
    } //end six image

    if ($request->file('seven')) {
      $seven = $request->file('seven');
      $seven_name = hexdec(uniqid()) . '.' . $seven->getClientOriginalExtension();
      $url_seven = "upload/ads/" . $seven_name;
      $seven->move(public_path("upload/ads/"), $seven_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->seven) {
        unlink($ads->seven);
      }
      $ads->update([
        'sevent' => $url_seven,
      ]);
    } //end seven image

    if ($request->file('eight')) {
      $eight = $request->file('eight');
      $eight_name = hexdec(uniqid()) . '.' . $eight->getClientOriginalExtension();
      $url_eight = "upload/ads/" . $eight_name;
      $eight->move(public_path("upload/ads/"), $eight_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->eight) {
        unlink($ads->eight);
      }
      $ads->update([
        'eight' => $url_eight,
      ]);
    } //end eight image

    if ($request->file('nine')) {
      $nine = $request->file('nine');
      $nine_name = hexdec(uniqid()) . '.' . $nine->getClientOriginalExtension();
      $url_nine = "upload/ads/" . $nine_name;
      $nine->move(public_path("upload/ads/"), $nine_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->nine) {
        unlink($ads->nine);
      }
      $ads->update([
        'nine' => $url_nine,
      ]);
    } //end nine image

    if ($request->file('ten')) {
      $ten = $request->file('ten');
      $ten_name = hexdec(uniqid()) . '.' . $ten->getClientOriginalExtension();
      $url_ten = "upload/ads/" . $ten_name;
      $ten->move(public_path("upload/ads/"), $ten_name);

      $ads = Advertisement::where('id', $id)->first();
      if ($ads->ten) {
        unlink($ads->ten);
      }
      $ads->update([
        'ten' => $url_ten,
      ]);
    } //end ten image







    // message
    Toastr::info("Advertisement Updated Success");
    return redirect()->back();
  } //end method
}
