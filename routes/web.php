<?php

use App\Http\Controllers\Admin\CustomersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Site\PagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuTypesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\OrderController as SiteOrderController;
use App\Http\Controllers\Site\BlogsController as SiteBlogsController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UrlRedirectController;
use App\Http\Controllers\Admin\CkeditorController;


// admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/history', [DashboardController::class, 'history'])->name('history');
    Route::get('/sitemap', [DashboardController::class, 'sitemap'])->name('sitemap');
    Route::post('/upload/sitemap', [DashboardController::class, 'uploadSitemap'])->name('sitemap.upload');
    Route::get('/menus/available-days', [MenuController::class, 'getAvailableDays'])->name('menus.available-days');

    Route::resource('pages', PageController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('menu-types', MenuTypesController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('blogs', BlogsController::class);
    Route::resource('url-redirects', UrlRedirectController::class);

    // ckeditor upload image
    Route::any('ckeditor-uploads', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/update-order-status/{id}', [OrderController::class, 'updateOrderStatus'])->name('orders.status');
    Route::get('/order/edit/{mealPlan}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/order/update/{mealPlan}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/order/deltails/{mealPlan}', [OrderController::class, 'details'])->name('orders.details');
    Route::delete('/order/delete/{mealPlan}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

// client
Route::group(['middleware' => ['url.redirect']], function () {
Route::post('/create-order', [SiteOrderController::class, 'createOrder'])->name('orders.menu');
Route::get('/order-details/{mealPlan}', [SiteOrderController::class, 'orderDetails'])->name('order.details');
Route::get('blogs/{slug?}', [SiteBlogsController::class , 'getIndex'])->name('blogs.index');
Route::get('/search', [SiteBlogsController::class, 'searchBlog'])->name('search');
Route::get('/{category}/blogs', [SiteBlogsController::class , 'getByCategory'])->name('blogs.category');
Route::get('/{slug?}', [PagesController::class, 'show'])->where('slug', '^(?!(admin|logout|login)(\/|$))[A-Za-z0-9+-_\/]+')->name('page');
});

Route::get('/sitemap.xml', function () {
    return response()->file(base_path('sitemap.xml'));
});

require __DIR__ . '/auth.php';

