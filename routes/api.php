<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\IndexController;

//Route::middleware('api')->group(function () {
    Route::post('v1/login'          , [App\Http\Controllers\Api\V1\UserController::class    , 'login']);
    Route::post('v1/register'       , [App\Http\Controllers\Api\V1\UserController::class    , 'register']);
    Route::get('v1/register'        , [App\Http\Controllers\Api\V1\UserController::class    , 'getregister']);
    Route::post('v1/token'          , [App\Http\Controllers\Api\V1\UserController::class    , 'token']);
    Route::post('v1/remember'       , [App\Http\Controllers\Api\V1\UserController::class    , 'remember']);



//Route::middleware('auth:api')->group(function (){
//    Route::get('v1/profile'          ,[App\Http\Controllers\Api\V1\UserController::class    , 'profile']);

//    Route::post('/user/store'                       , 'UserController@store');
//    Route::get('/profile'                           , 'UserController@profile');
//    Route::post('/user/update'                      , 'UserController@update');

//});

//});


Route::middleware('auth:api')->group(function () {
    Route::get('v1/index'           , [App\Http\Controllers\Api\V1\IndexController::class   , 'index']);
    Route::get('v1/profile'             ,   [App\Http\Controllers\Api\V1\UserController::class       , 'profile']);
    Route::get('v1/demands'             ,   [App\Http\Controllers\Api\V1\UserController::class       , 'demands']);
    Route::get('v1/laws'                ,   [App\Http\Controllers\Api\V1\UserController::class       , 'laws']);
    Route::post('v1/editprofile'        ,   [App\Http\Controllers\Api\V1\UserController::class       , 'editprofile']);
    Route::post('v1/form'               ,   [App\Http\Controllers\Api\V1\IndexController::class      , 'form']);
    Route::post('v1/workshopsign'       ,   [App\Http\Controllers\Api\V1\IndexController::class      , 'workshopsign']);
    Route::post('v1/discountcheck'      ,   [App\Http\Controllers\Api\V1\IndexController::class      , 'discountcheck']);
    Route::post('v1/pay'                ,   [App\Http\Controllers\Api\V1\IndexController::class      , 'pay']);
    Route::get('v1/payment.callback'    ,   [App\Http\Controllers\Api\V1\IndexController::class      ,'callbackpay'])->name('payment.callback');
    //Route::get('payment-success'    , 'ProfileController@pay')                  ->name('payment-success');
    //Route::get('payment-failed'     , 'ProfileController@pay')                  ->name('payment-failed');
    Route::post('v1/estelam'        , [App\Http\Controllers\Api\V1\EstelamController::class , 'estelam']);
    Route::GET('v1/workshops'       , [App\Http\Controllers\Api\V1\IndexController::class   , 'workshops']);
    Route::GET('v1/latest_version'  , [App\Http\Controllers\Api\V1\IndexController::class   , 'version']);
    Route::GET('v1/courts'          , [App\Http\Controllers\Api\V1\IndexController::class   , 'court']);
    Route::GET('v1/backtoapp'       , [App\Http\Controllers\Api\V1\IndexController::class   , 'callbackpay'])->name('backtoapp');

});




//Route::prefix('v1')->namespace('Api\v1')->group(function (){
//    Route::get('/index'                             , 'IndexController@index');
//    Route::get('/appversion'                , 'IndexController@appversion');

//    Route::get('/product'                           , 'ProductController@index');
//    Route::get('/product/search'                    , 'ProductController@sproduct');
//    Route::get('/product/variety'                   , 'ProductController@variety');
//    Route::get('/product/topview'                   , 'ProductController@topview');
//    Route::get('/product/{slug}'                    , 'ProductController@subproduct');
//    Route::get('/supplier'                          , 'SupplierController@index');
//    Route::get('/supplier/{slug}'                   , 'SupplierController@subsupplier');
//    Route::get('/technicalunit'                     , 'TechnicalunitController@index');
//    Route::get('/technicalunit/{slug}'              , 'TechnicalunitController@subtechnical');
//    Route::get('/market/sell'                       , 'MarketController@sell');
//    Route::get('/market/buy'                        , 'MarketController@buy');
//    Route::get('/market/{slug}'                     , 'MarketController@submarket');
//    Route::post('remember'                          , 'UserController@remember');
//    Route::post('/token'                            , 'UserController@token');
//    Route::get('/search/unicode'                    , 'SearchController@searchunicode');
//    Route::get('/filter/product'                    , 'SearchController@productfilter');
//    Route::get('/filter/supplier'                   , 'SearchController@supplierfilter');
//    Route::get('/filter/technical'                  , 'SearchController@technicalfilter');
//    Route::get('/filter/offersell'                  , 'SearchController@sellfilter');
//    Route::get('/filter/offerbuy'                   , 'SearchController@buyfilter');
//    Route::get('/filter/state'                      , 'SearchController@state');
//    Route::post('comment'                           , 'CommentController@comment');
//    Route::post('rate-number'                       , 'CommentController@commentrate');
//    Route::get('carbrand'                           , 'IndexController@carbrand');
//    Route::get('carproduct'                         , 'IndexController@carproduct');
//    Route::post('carmodel'                          , 'IndexController@carmodel');
//    Route::get('brand'                              , 'IndexController@brand');
//    Route::get('brand/{slug}'                       , 'IndexController@subbrand');
//    Route::get('productgroup'                       , 'IndexController@productgroup');
//    Route::get('offerselection'                     , 'MarketController@offerselection');
//    Route::get('technicalselection'                 , 'TechnicalunitController@technicalselection');
//    Route::get('supplierselection'                  , 'SupplierController@supplierselection');
//    Route::get('productvariety/{slug}/{id}'         , 'ProductController@subproductvariety');
//    Route::get('/company/{slug}'                    , 'IndexController@company');

   Route::middleware('auth:api')->group(function (){

    Route::post('/user/store'                       , 'UserController@store');
    Route::post('/user/update'                      , 'UserController@update');

   });

//
//        Route::post('/supplier/store'                   , 'SupplierController@store');
//        Route::post('/supplier/edit/{id}'               , 'SupplierController@updatesupplier');
//        Route::post('/supplier/carsupplierstore'        , 'SupplierController@carsupplierstore');
//        Route::delete('/supplier/carsupplierdelete/{id}', 'SupplierController@carsupplierdelete' )->name('carsupplierdelete');
//        Route::delete('/supplier/delete'                , 'SupplierController@supplierdelete');
//
//        Route::post('/technicalunit/store'              , 'TechnicalunitController@store');
//        Route::post('/technicalunit/edit/{id}'          , 'TechnicalunitController@updatetechnical');
//        Route::post('/technicalunit/cartechnicalstore'  , 'TechnicalunitController@cartechnicalstore');
//        Route::post('/technicalunit/delete'             , 'TechnicalunitController@technicaldelete');
//        Route::delete('/technical/delete'               , 'TechnicalunitController@technicaldelete');
//        Route::delete('/technicalunit/cartechnicaldelete/{id}'  , 'TechnicalunitController@cartechnicaldelete' )->name('cartechnicaldelete');
//
//        Route::post('/offer/store'                      , 'OfferController@store');
//        Route::get('/offer/edit/{id}'                   , 'OfferController@editoffer');
//        Route::post('/offer/edit/{id}'                  , 'OfferController@update');
//        Route::post('/offer/carofferstore'              , 'OfferController@carofferstore');
//        Route::delete('/offer/offerdelete/{id}'         , 'OfferController@offerdelete')->name('offerdelete');
//        Route::delete('/offer/carofferdelete/{id}'      , 'OfferController@carofferdelete')->name('carofferdelete');
//
//        Route::post('/recoverpass'                      , 'UserController@recoverpass');
//        Route::get('bmpsupplier'                        , 'SupplierController@bmpsupplier');
//        Route::get('bmptechnical'                       , 'TechnicalunitController@bmptechnical');
//        Route::get('bmpsell'                            , 'MarketController@bmpsell');
//        Route::get('bmpmarket'                          , 'MarketController@bmpmarket');
//
//        Route::post('/product/create/productvariety'    , 'ProductController@createproductvariety');
//        Route::get('productvariety'                     , 'ProductController@productvariety');
//        Route::delete('/productvariety/delete/{id}'     , 'ProductController@productbrandvaritydelete');
//
//        Route::get('/mark'                              , 'IndexController@markuser');
//        Route::post('/mark'                             , 'IndexController@markusercreate');
//        Route::delete('/unmark/{id}'                    , 'IndexController@markdelete');
//
//
//    });



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
