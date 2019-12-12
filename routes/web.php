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



Auth::routes();
Route::get('/','HomeController@index')->name('home');
Route::get('admin','AdminController@index')->name('inicio');
        //===================================================
        Route::get('admin/tag/{slug}','TagController@tag')->name('tag');
        Route::resource('tags', 		'Admin\TagController');

        Route::get('admin/commerce/{slug}','Admin\CommerceController@commerce')->name('commerce');
        Route::resource('commerces', 		'Admin\CommerceController');

           // Route::get('admin/commerce/{slug}','CommerceController@commerce')->name('commerce_departments');
            //Route::resource('commerce_departments', 		'Admin\CommerceController');
        //Relacion con mi  commerce_id
            Route::get('admin/departments/{slug}','Admin\DepartmentController@department')->name('department');
            Route::resource('departments', 		'Admin\DepartmentController');
                
            Route::get('admin/categories/{slug}','Admin\CategoryController@categories')->name('commerce_categories');
            Route::resource('categories', 		'Admin\CategoryController');

            Route::get('admin/products/{slug}', 'Admin\ProductController@products')->name('commerce_products');
                Route::resource('products', 		'Admin\ProductController');

                Route::get('admin/product/{slug}', 'Admin\ProductController@show')->name('product');
                Route::resource('products', 		'Admin\ProductController');

        Route::get('commerce/{slug}', 'Admin\CommerceController@getcommerce')->name('get_commerce');
        Route::resource('commerces', 		'Admin\CommerceController');
        //Route::resource('products', 		'Admin\ProductController');
        //Relacion con mi commerce_id

        Route::get('admin/my_commerces', 'Admin\CommerceController@my_commerces')->name('my_commerces');
        Route::resource('commerces', 		'Admin\CommerceController');

        
        
        Route::get('admin/categories', 'Admin\CategoryController@categories')->name('categories');
        Route::resource('categories', 		'Admin\CategoryController');
        //
        

        Route::get('admin/event/{slug}','EventController@event')->name('event');
        Route::resource('events', 		'Admin\EventController');

        Route::get('admin/promotion/{slug}','PromotionController@promotion')->name('promotion');
        Route::resource('promotions', 		'Admin\PromotionController');

        Route::get('admin/ad/{slug}','AdController@ad')->name('ad');
        Route::resource('ads', 		'Admin\AdController');

   // });
