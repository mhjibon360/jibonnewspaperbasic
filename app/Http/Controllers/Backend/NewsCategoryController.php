<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Newscategory;
use App\Models\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
  /**
   * news category show
   */
  public function allnewscategory()
  {
    $allcategory = Category::all();
    $allsubcategory = Subcategory::all();
    $newascat = Newscategory::first();
    return view('backend.pages.skip-category.index', compact(['allsubcategory', 'allcategory', 'newascat']));
  } // end method
  /**
   * news category show
   */

  public function allnewscategoryupdate(Request $request, $id)
  {
    $request->validate([
      'category_one' => 'required', 'unique:newscategories,category_one,' . $id,
      'category_two' => 'required', 'unique:newscategories,category_two,' . $id,
      'category_three' => 'required', 'unique:newscategories,category_three,' . $id,
      'category_four' => 'required', 'unique:newscategories,category_four,' . $id,
      'category_five' => 'required', 'unique:newscategories,category_five,' . $id,

      'subcategory_six' => 'required', 'unique:newscategories,subcategory_six,' . $id,
      'subcategory_seven' => 'required', 'unique:newscategories,subcategory_seven,' . $id,
      'subcategory_eight' => 'required', 'unique:newscategories,subcategory_eight,' . $id,
      'subcategory_nine' => 'required', 'unique:newscategories,subcategory_nine,' . $id,
      'subcategory_ten' => 'required', 'unique:newscategories,subcategory_ten,' . $id,

    ]);

    // udpate skip category data
    Newscategory::where('id', $id)->update([
      'category_one' => $request->category_one,
      'category_two' => $request->category_two,
      'category_three' => $request->category_three,
      'category_four' => $request->category_four,
      'category_five' => $request->category_five,

      'subcategory_six' => $request->subcategory_six,
      'subcategory_seven' => $request->subcategory_seven,
      'subcategory_eight' => $request->subcategory_eight,
      'subcategory_nine' => $request->subcategory_nine,
      'subcategory_ten' => $request->subcategory_ten,
    ]);
    Toastr::info("skip Category Updted Success");
    return redirect()->back();
  } // end method

}
