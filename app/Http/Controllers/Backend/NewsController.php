<?php

namespace App\Http\Controllers\Backend;

use App\Models\News;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $allnews = News::latest()->get();
   
    return view('backend.pages.news.index', compact('allnews'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::orderBy('category_name_en', 'asc')->get();
    $subcategories = Subcategory::all();

    return view('backend.pages.news.create', compact(['categories', 'subcategories']));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // return ($request->all());

    // validate all news post data
    $request->validate([
      'category_id' => ['required'],
      'title_en' => ['required', 'string', 'max:250', 'unique:news,title_en'],
      'title_bn' => ['required', 'string', 'max:250', 'unique:news,title_bn'],
      'image' => ['required'],
      'details_en' => ['nullable'],
      'details_bn' => ['nullable'],

    ]);

    // store image path location
    $image = $request->file('image');
    $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    $url = "upload/newspost/" . $name;
    $image->move(public_path("upload/newspost/"), $name);


    // add news post
    News::insert([
      'user_id' => Auth::user()->id,
      'category_id' => $request->category_id,
      'subcategory_id' => $request->subcategory_id,
      'title_en' => $request->title_en,
      'slug_en' => Str::slug($request->title_en),
      'title_bn' => $request->title_bn,
      'slug_bn' => Str::slug($request->title_bn),
      'image' => $url,
      'details_en' => $request->details_en,
      'details_bn' => $request->details_bn,
      'tags_en' => $request->tags_en,
      'tags_bn' => $request->tags_bn,
      'date' => date('d-m-y'),
      'show_at_breaking' => $request->show_at_breaking,
      'show_at_slider' => $request->show_at_slider,
      'show_at_three' => $request->show_at_three,
      'show_at_nine' => $request->show_at_nine,
      'created_at' => Carbon::now(),
    ]);
    Toastr::success("New news Added Success");
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
    $categories = Category::orderBy('category_name_en', 'asc')->get();
    $subcategories = Subcategory::all();
    $news = News::findOrFail($id);
    return view('backend.pages.news.edit', compact(['categories', 'subcategories', 'news']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    if ($request->hasFile('image')) {
      // validate all news post data
      $request->validate([
        'category_id' => ['required'],
        'title_en' => ['required', 'string', 'max:250', 'unique:news,title_en,' . $id],
        'title_bn' => ['required', 'string', 'max:250', 'unique:news,title_bn,' . $id],
        'image' => ['required'],
        'details_en' => ['nullable'],
        'details_bn' => ['nullable'],

      ]);

      // store image path location
      $image = $request->file('image');
      $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      $url = "upload/newspost/" . $name;
      $image->move(public_path("upload/newspost/"), $name);

      // if available on old image
      $news = News::where('id', $id)->first();
      if ($news->image) {
        unlink($news->image);
      }

      // add news post
      News::where('id', $id)->update([
        'user_id' => Auth::user()->id,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'title_en' => $request->title_en,
        'slug_en' => Str::slug($request->title_en),
        'title_bn' => $request->title_bn,
        'slug_bn' => Str::slug($request->title_bn),
        'image' => $url,
        'details_en' => $request->details_en,
        'details_bn' => $request->details_bn,
        'tags_en' => $request->tags_en,
        'tags_bn' => $request->tags_bn,
        'date' => date('d-m-y'),
        'show_at_breaking' => $request->show_at_breaking,
        'show_at_slider' => $request->show_at_slider,
        'show_at_three' => $request->show_at_three,
        'show_at_nine' => $request->show_at_nine,
        'updated_at' => Carbon::now(),
      ]);
      Toastr::info("News Updated Success");
      return redirect()->route('news.index');
    } else {
      // validate all news post data
      $request->validate([
        'category_id' => ['required'],
        'title_en' => ['required', 'string', 'max:250', 'unique:news,title_en,' . $id],
        'title_bn' => ['required', 'string', 'max:250', 'unique:news,title_bn,' . $id],
        'image' => ['nullable'],
        'details_en' => ['nullable'],
        'details_bn' => ['nullable'],

      ]);

      // add news post
      News::where('id', $id)->update([
        'user_id' => Auth::user()->id,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'title_en' => $request->title_en,
        'slug_en' => Str::slug($request->title_en),
        'title_bn' => $request->title_bn,
        'slug_bn' => Str::slug($request->title_bn),
        'details_en' => $request->details_en,
        'details_bn' => $request->details_bn,
        'tags_en' => $request->tags_en,
        'tags_bn' => $request->tags_bn,
        'date' => date('d-m-y'),
        'show_at_breaking' => $request->show_at_breaking,
        'show_at_slider' => $request->show_at_slider,
        'show_at_three' => $request->show_at_three,
        'show_at_nine' => $request->show_at_nine,
        'updated_at' => Carbon::now(),
      ]);
      Toastr::info("News Updated Success");
      return redirect()->route('news.index');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $news = News::where('id', $id)->first();
    if ($news->image) {
      unlink($news->image);
    }
    $news->delete();
    Toastr::warning("News  Delete Success");
    return redirect()->back();
  }

  /**
   * select subcategory depend on category
   */
  public function selectsubcategory(Request $request)
  {
    $category_id = $request->category_id;
    $subcategory = Subcategory::where('category_id', $category_id)->latest()->get();
    return response()->json($subcategory);
  }

  /**
   * change news status
   */
  public function newsstatus($id)
  {
    $news = News::where('id', $id)->first();
    if ($news->status == '1') {
      $news->update([
        'status' => 0,
      ]);
      Toastr::warning("News Inactive Success");
      return redirect()->back();
    } else {
      $news->update([
        'status' => 1,
      ]);
      Toastr::info("News Active Success");
      return redirect()->back();
    }
  }
}
