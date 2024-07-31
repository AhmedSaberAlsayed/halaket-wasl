<?php

use App\Models\SupCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupCategoryController;
use App\Http\Controllers\NewsPage\NewsWebSiteController;

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

// Route::get('/', function () {
// })->name('dashboardHome');


    Route::get('/', [NewsWebSiteController::class, 'index'])->name('NewsPage.index');
    Route::get('/news/{news}',[NewsWebSiteController::class, 'show'])->name('NewsPage.show');
    Route::get('/category/{category}',[NewsWebSiteController::class, 'CategoryShow'])->name('CategoryPage.index');
    // Route::post('deleteNewsy/{id}',[NewsController::class, 'destroy'])->name('News.delete');




Route::get('/thedashboard', function () {
    return view('Dashboard/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('createCategory',[CategoryController::class, 'create'])->name('category.create');
Route::post('storeCategory',[CategoryController::class, 'store'])->name('category.store');
Route::get('indexCategory',[CategoryController::class, 'index'])->name('category.index');
Route::get('editCategory',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('updateCategory',[CategoryController::class, 'update'])->name('category.update');
Route::post('deleteCategory/{id}',[CategoryController::class, 'destroy'])->name('category.delete');

// +++++++++++++++++++++++++  SUP_CATEGORIES        +++++++++++++++++++++++++++
Route::get('createSup_category',[SupCategoryController::class, 'create'])->name('Sup_category.create');
Route::post('storeSup_category',[SupCategoryController::class, 'store'])->name('Sup_category.store');
Route::get('indexSup_category',[SupCategoryController::class, 'index'])->name('Sup_category.index');
Route::get('editSup_category',[SupCategoryController::class, 'edit'])->name('Sup_category.edit');
Route::post('updateSup_category',[SupCategoryController::class, 'update'])->name('Sup_category.update');
Route::post('deleteSup_category/{id}',[SupCategoryController::class, 'destroy'])->name('Sup_category.delete');

//  ++++++++++++++++++++++++ News ++++++++++++++++++++++++++++++++++++++++
Route::get('createNews',[NewsController::class, 'create'])->name('News.create');
Route::get('getCategories',[NewsController::class, 'getCategories'])->name('News.getCategories');
Route::get('getSup_Categories',[NewsController::class, 'getSup_Categories'])->name('News.getSup_Categories');
Route::post('storeNews',[NewsController::class, 'store'])->name('News.store');
Route::get('indexNews' , [NewsController::class, 'index'])->name('News.index');
Route::get('editNews',[NewsController::class, 'edit'])->name('News.edit');
Route::post('updateNews',[NewsController::class, 'update'])->name('News.update');
Route::post('deleteNewsy/{id}',[NewsController::class, 'destroy'])->name('News.delete');
});





// +++++++++++++++++++++++++  the website      +++++++++++++++++++++++++++





require __DIR__.'/auth.php';







