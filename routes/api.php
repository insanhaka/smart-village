<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/getBusinessId', function (Request $request) {
    $arrCategories = App\Product_Categories::where('business_id', $request->paramid)->orderBy('kategori_produk','asc')->pluck('id','kategori_produk')->prepend('','Pilih Kategori');
    return response()->json(['code' => 200,'data' => $arrCategories], 200);
})->name('getBusinessId');

// Route::post('user-activation', 'AdminController@activation');
