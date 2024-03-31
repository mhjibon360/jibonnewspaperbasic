<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $allcategory = Category::latest()->get();
    return view('backend.pages.category.index', compact('allcategory'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.pages.category.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'category_name_en' => ['required', 'string', 'max:100', 'unique:categories,category_name_en'],
      'category_name_bn' => ['required', 'string', 'max:100', 'unique:categories,category_name_en'],
    ]);
    Category::insert([
      'category_name_en' => $request->category_name_en,
      'category_slug_en' => Str::slug($request->category_name_en),
      'category_name_bn' => $request->category_name_bn,
      'category_slug_bn' => Str::slug($request->category_name_bn),
      'created_at' => Carbon::now(),

    ]);
    Toastr::success("Category Added Success");
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
    $category = Category::where('id', $id)->first();
    return view('backend.pages.category.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'category_name_en' => ['required', 'string', 'max:100', 'unique:categories,category_name_en,' . $id],
      'category_name_bn' => ['required', 'string', 'max:100', 'unique:categories,category_name_en,' . $id],
    ]);
    Category::where('id', $id)->update([
      'category_name_en' => $request->category_name_en,
      'category_slug_en' => Str::slug($request->category_name_en),
      'category_name_bn' => $request->category_name_bn,
      'category_slug_bn' => Str::slug($request->category_name_bn),
      'updated_at' => Carbon::now(),

    ]);

    Toastr::success("Category Updated Success");
    return redirect()->route('category.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Category::where('id', $id)->delete();
    Toastr::warning("Category Delete Success");
    return redirect()->back();
  }
}
