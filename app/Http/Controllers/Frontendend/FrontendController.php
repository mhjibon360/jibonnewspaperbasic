<?php

namespace App\Http\Controllers\Frontendend;

use DateTime;
use App\Models\News;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Photogallery;
use App\Models\Videogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Newscategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
  /**
   * frontend home page
   */
  public function index()
  {
    $videogallery = Videogallery::where('status', 1)->inRandomOrder()->latest()->take(5)->get();
    $photogallery = Photogallery::where('status', 1)->latest()->get();
    $allcategory = Category::orderBy('category_name_en', 'asc')->take(10)->get();
    $alltabnews = News::where('status', 1)->inRandomOrder()->latest()->take(8)->get();

    // grab the category 
    $newscat = Newscategory::first();
    // category one wise news run
    $catone = Category::where('id', $newscat->category_one)->first();
    $catonenews = News::where('status', 1)->where('category_id', $catone->id)->latest()->get();
    $catonenewsone = $catonenews->splice('0', 1);
    $catonenewstwo = $catonenews->splice('0', 2);
    $catonenewsfivee = News::where('status', 1)->where('category_id', $catone->id)->latest()->inRandomOrder()->take(5)->get();
    $catonenewsfive = $catonenewsfivee->splice(1, 6);
    // category two wise news run
    $cattwo = Category::where('id', $newscat->category_two)->first();
    $cattwonews = News::where('status', 1)->where('category_id', $cattwo->id)->latest()->get();
    $cattwoone = $cattwonews->splice('0', 1);
    $cattwotwo = $cattwonews->splice('0', 2);
    // category three wise news run
    $catthree = Category::where('id', $newscat->category_three)->first();
    $catthreenews = News::where('status', 1)->where('category_id', $catthree->id)->latest()->get();
    $catthreeone = $catthreenews->splice('0', 1);
    $catthreetwo = $catthreenews->splice('0', 2);
    // category four wise news run
    $catfour = Category::where('id', $newscat->category_four)->first();
    $catfournews = News::where('status', 1)->where('category_id', $catfour->id)->latest()->get();
    $catfourone = $catfournews->splice('0', 1);
    $catfourtwo = $catfournews->splice('0', 2);
    // category five post
    $categoryfive = Category::where('id', $newscat->category_five)->first();
    $categoryfivenews = News::where('status', 1)->where('category_id', $categoryfive->id)->latest()->get();
    $catfiveone = $categoryfivenews->splice(0, 1);
    $catfivefour = $categoryfivenews->splice(0, 4);

    // show news depend on subcategory six
    $subcatonename = Subcategory::where('id', $newscat->subcategory_six)->first();
    $subcategorynewspost = News::where('status', 1)->where('subcategory_id', $subcatonename->id)->latest()->get();
    $subcatsixone = $subcategorynewspost->splice(0, 1);
    $subcatsixtwo = $subcategorynewspost->splice(0, 1);

    // show news depend on subcategory seven
    $subcatonenameseven = Subcategory::where('id', $newscat->subcategory_seven)->first();
    $subcategorysevennewspost = News::where('status', 1)->where('subcategory_id', $subcatonenameseven->id)->latest()->get();
    $subcatsevenone = $subcategorysevennewspost->splice(0, 1);
    $subcatseventhree = $subcategorysevennewspost->splice(0, 3);

    // show news depend on subcategory eight
    $subcatonenameeight = Subcategory::where('id', $newscat->subcategory_eight)->first();
    $subcategoryeightnewspost = News::where('status', 1)->where('subcategory_id', $subcatonenameeight->id)->latest()->get();
    $subcateightone = $subcategoryeightnewspost->splice(0, 1);
    $subcateightthree = $subcategoryeightnewspost->splice(0, 3);

    // show news depend on subcategory nine
    $subcatonenamenine = Subcategory::where('id', $newscat->subcategory_nine)->first();
    $subcategoryninenewspost = News::where('status', 1)->where('subcategory_id', $subcatonenamenine->id)->latest()->get();
    $subcatnineone = $subcategoryninenewspost->splice(0, 1);
    $subcatninethree = $subcategoryninenewspost->splice(0, 3);


    // advertisement
    $ads=Advertisement::first();

    return view('frontend.pages.index', compact([
      'videogallery', 'photogallery', 'allcategory', 'alltabnews', 'catone', 'catonenewsone',
      'catonenewstwo', 'catonenewsfive', 'cattwo', 'cattwoone', 'cattwotwo', 'catthree', 'catthreeone', 'catthreetwo', 'catfour',
      'catfourone', 'catfourtwo', 'categoryfive', 'catfiveone', 'catfivefour', 'subcatonename', 'subcatsixone', 'subcatsixtwo',
      'subcatonenameseven', 'subcatsevenone', 'subcatseventhree', 'subcatonenameeight', 'subcateightone', 'subcateightthree',
      'subcatonenamenine', 'subcatnineone', 'subcatninethree','ads'
    ]));
  }  //end method


  /**
   * news details page
   */
  public function newsdetails($id, $slug)
  {
    $news = News::with(['categories', 'subcategories', 'users'])->findOrFail($id);
    $alltagsen = explode(',', $news->tags_en);
    $alltagsbn = explode(',', $news->tags_bn);
    // news view
    $newskey = 'news' . $news->id;

    if (!Session::has($newskey)) {
      $news->increment('views');
      Session::put($newskey, 1);
    }
    $relatednews = News::where('category_id', $news->category_id)->where('id', '!=', $news->id)->latest()->take(6)->get();
       // advertisement
       $ads=Advertisement::first();
    return view('frontend.pages.news-details', compact(['news', 'alltagsen', 'alltagsbn', 'relatednews','ads']));
  } //end method

  /**
   * category news page
   */
  public function categorynewspage($id, $slug)
  {
    $category = Category::findOrFail($id);
    $categorynews = News::where('status', 1)->where('category_id', $category->id)->latest()->get();
    // category news one
    $catnews_item_one = $categorynews->splice('0', 1);
    $catnews_item_two = $categorynews->splice('0', 2);
    $catnews_item_nine = $categorynews->splice('0', 500);



    // return ($catnews_item_one);
    return view('frontend.pages.news-category', compact(['category', 'catnews_item_one', 'catnews_item_two', 'catnews_item_nine']));
  }  //end method

  /**
   * category news page
   */
  public function subcategorynewspage($id, $slug)
  {
    $subcategory = Subcategory::findOrFail($id);
    $subcategorynews = News::where('status', 1)->where('subcategory_id', $subcategory->id)->latest()->get();
    // category news one
    $subcatnews_item_one = $subcategorynews->splice('0', 1);
    $subcatnews_item_two = $subcategorynews->splice('0', 2);
    $subcatnews_item_nine = $subcategorynews->splice('0', 500);

    return view('frontend.pages.news-subcategory', compact(['subcategory', 'subcatnews_item_one', 'subcatnews_item_two', 'subcatnews_item_nine']));
  }  //end method

  /**
   * tag news page
   */
  public function tagnewspage(Request $request, $tag)
  {

    $tag  = addslashes($request->tag);
    $tagnews = News::orWhere('tags_en', 'like', '%' . $tag . '%')->orWhere('tags_bn', 'like', '%' . $tag . '%')->get();
    return view('frontend.pages.tags-news', compact('tagnews', 'tag'));
  }


  /**
   * author news
   */
  public function authornews($id, $name)
  {
    $authorname = User::where('id', $id)->first();
    $authornews = News::where('status', 1)->where('user_id', $authorname->id)->latest()->paginate(8);
    return view('frontend.pages.author-news', compact(['authorname', 'authornews']));
  }

  /**
   * old news
   */
  public function oldnews(Request $request, FlasherInterface $flasher)
  {
    $oldate = $request->old_news;
    $oldnews = News::where('date', $oldate)->latest()->paginate(8);

    if (count($oldnews) > 0) {
      $flasher->addSuccess($oldate . ' Find news success.');
    } else {
      $flasher->addError($oldate . ' Soory we cannot find any news');
    }
    return view('frontend.pages.old-news', compact('oldnews', 'oldate'));
  }  //end method


  /**
   * comment store
   */
  public function comment(Request $request, FlasherInterface $flasher)
  {


    $request->validate([
      'comment' => 'required',
    ], ([
      'comment.required' => 'please write your comment',
    ]));


    Comment::insert([
      'user_id' => Auth::user()->id,
      'news_id' => $request->news_id,
      'comment' => $request->comment,
      'created_at' => Carbon::now(),
    ]);

    $flasher->addSuccess('Comment Added Sucess');
    return redirect()->back();
  } // end method

  /**
   * serach news
   */
  public function searchnews(Request $request)
  {

    // validate form 
    $request->validate([
      'search_news' => 'required',
    ], ([
      'search_news.required' => 'please type your search data'
    ]));


    $search = $request->search_news;
    $searchnews = News::orWhere('title_en', 'like', '%' . $search . '%')->orWhere('title_bn', 'like', '%' . $search . '%')->get();
    // return($searchnews);
    return view('frontend.pages.serach-news', compact('searchnews', 'search'));
  }
}
