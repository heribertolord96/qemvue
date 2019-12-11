<?php

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

Route::get('/','HomeController@index')->name('home');

Auth::routes();
Route::get('/','HomeController@logged')->name('inicio');
        //===================================================
        Route::get('admin/tag/{slug}','TagController@tag')->name('tag');
        Route::resource('tags', 		'Admin\TagController');

        Route::get('admin/category/{slug}','CategoryController@category')->name('category');
        Route::resource('categories', 		'Admin\CategoryController');

        Route::get('admin/department/{slug}','DepartmentController@department')->name('department');
        Route::resource('departments', 		'Admin\DepartmentController');

        Route::get('admin/commerce/{slug}','CommerceController@commerce')->name('commerce');
       // Route::get('admin/commerce/{slug}','CommerceControllerUser@commerce')->name('commerce');
        Route::resource('commerces', 		'Admin\CommerceController');

           // Route::get('admin/commerce/{slug}','CommerceController@commerce')->name('commerce_departments');
            //Route::resource('commerce_departments', 		'Admin\CommerceController');

        Route::get('admin/my_commerces', 'Admin\CommerceController@my_commerces')->name('my_commerces');
        Route::resource('commerces', 		'Admin\CommerceController');
        

        Route::get('admin/product/{slug}','ProductController@product')->name('product');
        Route::resource('products', 		'Admin\ProductController');

        Route::get('admin/event/{slug}','EventController@event')->name('event');
        Route::resource('events', 		'Admin\EventController');

        Route::get('admin/promotion/{slug}','PromotionController@promotion')->name('promotion');
        Route::resource('promotions', 		'Admin\PromotionController');

        Route::get('admin/ad/{slug}','AdController@ad')->name('ad');
        Route::resource('ads', 		'Admin\AdController');

   // });
