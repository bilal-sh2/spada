<?php

use App\Http\Controllers\InformationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\CarouselImageController;
use App\Http\Controllers\BranchController;
use App\Models\Video;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    $videoCount = Video::count();
    $articleCount = Article::count();
    $categoryCount = Category::count();
    $productCount = Product::count();
    return view('dashboard', compact('articleCount', 'categoryCount', 'productCount', 'videoCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');


Route::middleware('auth')->group(function () {

    // *********************** Product Routes ********************************
    Route::resource('/dashboard/products', ProductController::class);
    // *********************** Category Routes ********************************
    Route::resource('/dashboard/category', CategoryController::class);
    // *********************** Article Routes ********************************
    Route::resource('/dashboard/article', ArticleController::class);
    // *********************** Video Routes ********************************
    Route::resource('/dashboard/video', VideoController::class);
    // *********************** Info Routes ********************************
    Route::resource('/dashboard/info', InformationController::class);
    // *********************** carousel Routes ********************************
    Route::resource('carousel', CarouselImageController::class);

    // *********************** branches Routes ********************************
    Route::resource('branches', BranchController::class);


    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});

// *********************** website Routes ********************************
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [CategoryController::class, 'show_web']);
Route::get('/category', [CategoryController::class, 'show_cat'])->name('web.category');
Route::get('/articles/show', [ArticleController::class, 'show_articles'])->name('web.articles');
Route::get('/videos/show', [VideoController::class, 'show_videos'])->name('web.videos');
Route::get('/category/{category}', [CategoryController::class, 'show_public'])->name('public.category');
Route::get('/article/{article}', [ArticleController::class, 'show_public'])->name('public.article');
Route::get('/video/{video}', [VideoController::class, 'show_public'])->name('public.video');
Route::get('/product/{product}', [ProductController::class, 'show_public'])->name('public.product');
Route::get('/about-us', [InformationController::class, 'show_public'])->name('public.info');
Route::get('/contact-us', [InformationController::class, 'show_contact'])->name('public.info.contact');

// *********************** Contact Route ********************************

Route::post('/lead/store', [LeadController::class, 'store'])->name('lead.store');

require __DIR__.'/auth.php';
