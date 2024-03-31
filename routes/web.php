<?php

use App\Models\Videogallery;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\LivetvController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\LanguateController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\AdminaccountController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\NewsCategoryController;
use App\Http\Controllers\Backend\PhotogalleryController;
use App\Http\Controllers\Frontendend\FrontendController;
use App\Http\Controllers\Backend\AdrvertisementController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\RolepermissionController;

// =========================================frontend controller all routes
Route::controller(FrontendController::class)->group(function () {
  Route::get('/', 'index')->name('home.index');
  Route::get('news/details/{id}/{slug}', 'newsdetails')->name('news.details');
  Route::get('category/news/{id}/{slug}', 'categorynewspage')->name('category.news.page');
  Route::get('subcategory/news/{id}/{slug}', 'subcategorynewspage')->name('subcategory.news.page');
  Route::get('/news/tag/{tag}', 'tagnewspage')->name('tags.news.page');
  Route::get('news/admin/{id}/{name}', 'authornews')->name('author.news');
  Route::get('old/news', 'oldnews')->name('old.news');
  Route::get('search/news', 'searchnews')->name('serach.news');

  // comment 
  Route::post('comment/store', 'comment')->name('store.comment')->middleware(['auth', 'verified']);
});

Route::controller(LanguateController::class)->group(function () {
  Route::get('languate/english', 'english')->name('languate.english');
  Route::get('languate/bangla', 'bangla')->name('languate.bangla');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// =======================================admin backend all routes
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
  // backendcontroller all routes
  Route::controller(BackendController::class)->group(function () {
    Route::get('admin/dashboard', 'index')->name('admin.dashboard');
    Route::post('admin/logout', 'logout')->name('admin.logout');
  });

  // =============admin proflie and admin account all routes
  /** admin account update */
  Route::controller(AdminaccountController::class)->group(function () {
    Route::get('admin/edit/profile', 'editprofile')->name('edit.admin.profile');
    Route::put('admin/update/profile/{id}', 'updateprofile')->name('update.admin.profile');
    Route::put('admin/update/password/{id}', 'updatepassword')->name('update.admin.password');
  });


  // =============category all routes
  Route::resource('category', CategoryController::class);

  // ============subcategory all routes
  Route::resource('subcategory', SubcategoryController::class);
  // ===============news all routes
  Route::resource('admin/news', NewsController::class);
  Route::get('select/subcategory/', [NewsController::class, 'selectsubcategory'])->name('select.subcategory');
  Route::get('change/news/status/{id}', [NewsController::class, 'newsstatus'])->name('change.news.status');

  // ==================photo gallery all routes
  Route::resource('photogallery', PhotogalleryController::class);
  // ==========================video controller all routes
  Route::resource('videogallery', VideoController::class);
  // ================live tv all routes
  Route::controller(LivetvController::class)->group(function () {
    Route::get('manage/live/tv', 'mangaelivetv')->name('mange.live.tv');
    Route::put('update/live/tv/{id}', 'updatelivetv')->name('update.live.tv');
    Route::get('change/live/tv/status/{id}', 'status')->name('live.tv.status');
  });

  // ======================================newscategory all routes
  Route::controller(NewsCategoryController::class)->group(function () {
    Route::get('all/news/category', 'allnewscategory')->name('all.news.category');
    Route::put('all/news/category/update/{id}', 'allnewscategoryupdate')->name('all.news.category.update');
  });

  // ================adrvertisement all routes
  Route::controller(AdrvertisementController::class)->group(function () {
    Route::get('mangage/ads', 'mangaead')->name('manage.ads');
    Route::put('update/ads/{id}', 'updateads')->name('update.ads');
  });

  // =============================all admin account manage all routes
  Route::controller(AdminController::class)->group(function () {
    Route::get('show/all/admin/account', 'index')->name('show.all.admin.account');
    Route::get('create/admin/account', 'create')->name('create.admin.account');
    Route::post('store/admin/account', 'store')->name('store.admin.account');
    Route::get('edit/admin/account/{id}', 'edit')->name('edit.admin.account');
    Route::put('update/admin/account/{id}', 'update')->name('update.admin.account');
    Route::get('status/admin/account/{id}', 'status')->name('status.admin.account');
    Route::get('delete/admin/account/{id}', 'delete')->name('delete.admin.account');
  });

  // ==========================all role routes
  Route::resource('role', RoleController::class);
  // ==========================all permissions routes
  Route::resource('permission', PermissionController::class);
  // ===============all role has permission routes
  Route::resource('role-has-permission', RolepermissionController::class);
});
