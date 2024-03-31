<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SubcategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $subcategories = Subcategory::with('categories')->latest()->get();
    return view('backend.pages.subcategory.index', compact('subcategories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::all();
    return view('backend.pages.subcategory.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $request->validate([
      'category_id' => ['required'],
      'subcategory_name_en' => ['required', 'string', 'max:100', 'unique:subcategories,subcategory_name_en'],
      'subcategory_name_bn' => ['required', 'string', 'max:100', 'unique:subcategories,subcategory_name_bn'],
    ]);

    Subcategory::insert([
      'category_id' => $request->category_id,
      'subcategory_name_en' => $request->subcategory_name_en,
      'subcategory_slug_en' => Str::slug($request->subcategory_name_en),
      'subcategory_name_bn' => $request->subcategory_name_bn,
      'subcategory_slug_bn' => Str::slug($request->subcategory_name_bn),
      'created_at' => Carbon::now(),

    ]);

    Toastr::success("SubCategory Added Success");
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
    $categories = Category::all();
    $subcategory = Subcategory::findOrFail($id);
    return view('backend.pages.subcategory.edit', compact(['categories', 'subcategory']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'category_id' => ['required'],
      'subcategory_name_en' => ['required', 'string', 'max:100', 'unique:subcategories,subcategory_name_en,' . $id],
      'subcategory_name_bn' => ['required', 'string', 'max:100', 'unique:subcategories,subcategory_name_bn,' . $id],
    ]);

    Subcategory::where('id', $id)->update([
      'category_id' => $request->category_id,
      'subcategory_name_en' => $request->subcategory_name_en,
      'subcategory_slug_en' => Str::slug($request->subcategory_name_en),
      'subcategory_name_bn' => $request->subcategory_name_bn,
      'subcategory_slug_bn' => Str::slug($request->subcategory_name_bn),
      'updated_at' => Carbon::now(),

    ]);

    Toastr::success("SubCategory Update Success");
    return redirect()->route('subcategory.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Subcategory::where('id', $id)->delete();
    Toastr::warning("subcategory Delete Success");
    return redirect()->back();
  }
}
