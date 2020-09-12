<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('welcomeadmin');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::get('/help', 'HomeController@help')->name('help');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/usaha', 'BusinessController@index')->name('usaha');
    Route::get('/usaha/add', 'BusinessController@add');
    Route::post('/usaha/create', 'BusinessController@create');
    Route::post('/usaha/activation', 'BusinessController@activation');
    Route::get('/usaha/{id}/edit', 'BusinessController@edit');
    Route::post('/usaha/{id}/update', 'BusinessController@update');
    Route::get('/usaha/{id}/delete', 'BusinessController@delete');
    // Route::get('/usaha/{id}/view', 'BusinessController@view');

    Route::get('/kategori_produk', 'ProductCategoriesController@index')->name('product_categories');
    Route::get('/kategori_produk/add', 'ProductCategoriesController@add');
    Route::post('/kategori_produk/create', 'ProductCategoriesController@create');
    Route::post('/kategori_produk/activation', 'ProductCategoriesController@activation');
    Route::get('/kategori_produk/{id}/edit', 'ProductCategoriesController@edit');
    Route::post('/kategori_produk/{id}/update', 'ProductCategoriesController@update');
    Route::get('/kategori_produk/{id}/delete', 'ProductCategoriesController@delete');

    Route::get('/{id}/produk', 'ProductsController@index')->name('product');
    Route::get('/produk/add', 'ProductsController@add');
    // Route::post('/produk/create', 'ProductsController@create');
    // Route::post('/produk/activation', 'ProductsController@activation');
    // Route::get('/produk/{id}/edit', 'ProductsController@edit');
    // Route::post('/produk/{id}/update', 'ProductsController@update');
    // Route::get('/produk/{id}/delete', 'ProductsController@delete');

    Route::get('/aspirasi', 'AspirasiController@index')->name('aspirasi');
    Route::get('/aspirasi/{id}/delete', 'AspirasiController@delete');

    Route::get('/berita', 'NewsController@index')->name('news');
    Route::get('/berita/add', 'NewsController@add');
    Route::get('/berita/{id}/view', 'NewsController@view');
    Route::post('/berita/create', 'NewsController@create');
    Route::get('/berita/{id}/edit', 'NewsController@edit');
    Route::post('/berita/{id}/update', 'NewsController@update');
    Route::get('/berita/{id}/delete', 'NewsController@delete');
    Route::post('/berita/activation', 'NewsController@activation');

    Route::get('/roles', 'RolesController@index')->name('roles');
    Route::get('/roles/add', 'RolesController@add');\
    Route::post('/roles/create', 'RolesController@create');
    Route::get('/roles/{id}/edit', 'RolesController@edit');
    Route::post('/roles/{id}/update', 'RolesController@update');
    Route::get('/roles/{id}/delete', 'RolesController@delete');

    Route::get('/user', 'AdminController@index')->name('admin');
    Route::get('/user/{id}/edit', 'AdminController@edit');
    Route::post('/user/{id}/update', 'AdminController@update');
    Route::get('/user/{id}/delete', 'AdminController@delete');
    Route::post('/user/activation', 'AdminController@activation');

    Route::post('/getcategori', function (Request $request) {
        // $arrCategories = App\Product_Categories::where('business_id', $request->paramid)->orderBy('kategori_produk','asc')->pluck('id','kategori_produk')->prepend('','Pilih Kategori');
        $data = $request->paramid;
        return response()->json(['code' => 200,'data' => $data], 200);
    })->name('getCategoryFromBusiness');

});
