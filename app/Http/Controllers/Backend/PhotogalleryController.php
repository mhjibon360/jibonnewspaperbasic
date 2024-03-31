<?php

namespace App\Http\Controllers\Backend;

use App\Models\Photogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PhotogalleryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $allphoto = Photogallery::all();
    return view('backend.pages.photogallery.index', compact('allphoto'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.pages.photogallery.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'image' => ['required'],
    ]);

    // store image path /and image upload by image intervention v.2(this one old version)
    $image = $request->file('image');
    foreach ($image as $img) {
      $name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
      $url = "upload/photogallery/" . $name;
      $img->move(public_path("upload/photogallery/"), $name);

      Photogallery::insert([
        'image' => $url,
        'created_at' => Carbon::now(),
      ]);
    }


    Toastr::success("News Photo Added in Gallery Success");
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $gallery = Photogallery::where('id', $id)->first();
    if ($gallery->status == '1') {
      $gallery->update([
        'status' => 0
      ]);
      Toastr::warning("This Gallery Image Inactive Success");
      return redirect()->back();
    } else {
      $gallery->update([
        'status' => 1
      ]);
      Toastr::info("This Gallery Image Active Success");
      return redirect()->back();
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $gallery = Photogallery::findOrFail($id);
    return view('backend.pages.photogallery.edit', compact('gallery'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    if ($request->file('image')) {

      $request->validate([
        'image' => ['required'],
      ]);


      // store image path /and image upload by image intervention v.2(this one old version)
      $image = $request->file('image');
      foreach ($image as $img) {
        $name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        $url = "upload/photogallery/" . $name;
        $img->move(public_path("upload/photogallery/"), $name);

        $gallery = Photogallery::where('id', $id)->first();
        // unlink old gallery image
        if ($gallery->image) {
          unlink($gallery->image);
        }
        
        Photogallery::where('id', $id)->update([
          'image' => $url,
          'created_at' => Carbon::now(),
        ]);
      }


      Toastr::info("Photo Update in Gallery Success");
      return redirect()->route('photogallery.index');
    } else {
      Toastr::error("We Can not found to Updated new anythings");
      return redirect()->route('photogallery.index');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $gallery = Photogallery::where('id', $id)->first();
    // unlink old gallery image
    if ($gallery->image) {
      unlink($gallery->image);
    }

    $gallery->delete();
    Toastr::warning("Photo Deleted Success From Photo Gallery");
    return redirect()->back();
  }
}
