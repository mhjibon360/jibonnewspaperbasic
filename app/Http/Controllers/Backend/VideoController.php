<?php

namespace App\Http\Controllers\Backend;

use App\Models\Videogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class VideoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $allvideo = Videogallery::latest()->get();
    return view('backend.pages.videogallery.index', compact('allvideo'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.pages.videogallery.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // id	title_en	title_bn	link	image	status	created_at	updated_at	
    // validate some required data
    $request->validate([
      'title_en' => ['required', 'unique:videogalleries,title_en'],
      'title_bn' => ['required', 'unique:videogalleries,title_bn'],
      'link' => ['required', 'unique:videogalleries,title_bn'],
      'image' => ['required'],
    ]);

    // store image path
    $image = $request->file('image');
    $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    $url = "upload/videogallery/" . $name;
    $image->move(public_path("upload/videogallery/"), $name);

    // store video gallery data
    Videogallery::insert([
      'title_en' => $request->title_en,
      'title_bn' => $request->title_bn,
      'link' => $request->link,
      'image' => $url,
      'created_at' => Carbon::now(),
    ]);
    Toastr::success("New Video Added in gallery success");
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $gallery = Videogallery::where('id', $id)->first();
    if ($gallery->status == '1') {
      $gallery->update([
        'status' => 0
      ]);
      Toastr::warning("This Gallery Video Inactive Success");
      return redirect()->back();
    } else {
      $gallery->update([
        'status' => 1
      ]);
      Toastr::info("This Gallery Video Active Success");
      return redirect()->back();
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $gallery = Videogallery::findOrFail($id);
    return view('backend.pages.videogallery.edit', compact('gallery'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    if ($request->file('image')) {
      // validate some required data
      $request->validate([
        'title_en' => ['required', 'unique:videogalleries,title_en,' . $id],
        'title_bn' => ['required', 'unique:videogalleries,title_bn,' . $id],
        'link' => ['required', 'unique:videogalleries,title_bn'],
        'image' => ['required'],
      ]);

      // store image path
      $image = $request->file('image');
      $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      $url = "upload/videogallery/" . $name;
      $image->move(public_path("upload/videogallery/"), $name);

      // unlink old image
      $gallery = Videogallery::where('id', $id)->first();
      // unlink old gallery image
      if ($gallery->image) {
        unlink($gallery->image);
      }

      // store video gallery data
      Videogallery::where('id', $id)->update([
        'title_en' => $request->title_en,
        'title_bn' => $request->title_bn,
        'link' => $request->link,
        'image' => $url,
        'updated_at' => Carbon::now(),
      ]);
      Toastr::info("Video Updated in gallery success");
      return redirect()->route('videogallery.index');
    } else {
      // validate some required data
      $request->validate([
        'title_en' => ['required', 'unique:videogalleries,title_en,' . $id],
        'title_bn' => ['required', 'unique:videogalleries,title_bn,' . $id],
        'link' => ['required', 'unique:videogalleries,title_bn'],
        'image' => ['nullable'],
      ]);

      // store video gallery data
      Videogallery::where('id', $id)->update([
        'title_en' => $request->title_en,
        'title_bn' => $request->title_bn,
        'link' => $request->link,
        'updated_at' => Carbon::now(),
      ]);
      Toastr::info("Video Updated in gallery success");
      return redirect()->route('videogallery.index');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $gallery = Videogallery::where('id', $id)->first();
    // unlink old gallery image
    if ($gallery->image) {
      unlink($gallery->image);
    }

    $gallery->delete();
    Toastr::warning("Video Deleted Success From Photo Gallery");
    return redirect()->back();
  }
}
