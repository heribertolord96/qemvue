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

Route::get('/', function () {
    return view('index');
    });

Auth::routes();
Route::get('/main', function () {
    return view('vue_container/vue_container');
})->name('main');

Route::get('/','HomeController@index')->name('home');
Route::get('admin','AdminController@index')->name('inicio');
        //===================================================
        Route::get('admin/tag/{slug}','Admin\TagController@tag')->name('tag');
        Route::resource('tags', 		'Admin\TagController');
//Commerce routes
        Route::get('admin/{slug}/commerce','Admin\CommerceController@commerce')->name('commerce');
        Route::resource('commerces', 		'Admin\CommerceController');

        Route::get('get_commerce', 'Admin\CommerceController@getcommerce')->name('getcommerce');
        Route::resource('commerces', 		'Admin\CommerceController');

        Route::get('admin/my_commerces', 'Admin\CommerceController@my_commerces')->name('my_commerces');
        //En el menu lateral...
        Route::get( 'Admin\CommerceController@menu_mycommerces')->name('menu_mycommerces');
        Route::resource('commerces', 		'Admin\CommerceController');

//Commerce routes   
//Department routes
//Relacion con mi  commerce_id
    Route::get('admin/{slug}/departments','Admin\DepartmentController@department')//Obtiene los departamentos de una tienda
    ->name('department');
    Route::resource('departments', 		'Admin\DepartmentController');
//Department routes
//Category routes
        Route::get('admin/categories/{slug}','Admin\CategoryController@categories')->name('commerce_categories');
        Route::resource('categories', 		'Admin\CategoryController');
        Route::get('admin/categories', 'Admin\CategoryController@categories')->name('categories');
        Route::resource('categories', 		'Admin\CategoryController');
        
//Category routes
//Product routes   

Route::get('admin/{slug}/myproducts', 'Admin\ProductController@myproducts')
->name('myproducts');//Del metodo index
    Route::get('admin/{slug}/products', 'Admin\ProductController@products')
    ->name('commerce_products');//Del metodo index
    //Route::resource('products', 		'Admin\ProductController');
    Route::resource('products', 		'Admin\ProductController@index');
    Route::get('admin/product/{slug}', 'Admin\ProductController@show')
    ->name('product');
    Route::resource('products', 		'Admin\ProductController');
//Product routes 
//Promotion routes
    Route::get('admin/promotion/{slug}','Admin\PromotionController@promotion')->name('promotion');
    Route::resource('promotions', 		'Admin\PromotionController');
//Promotion routes
//Event routes
    Route::get('admin/event/{slug}','Admin\EventController@event')->name('event');
    Route::resource('events', 		'Admin\EventController');
//Event routes
//Ad Routes
    //Route::get('admin/ad/{slug}','Admin\AdController@ad')->name('ad');
   // Route::resource('ads', 		'Admin\AdController');
//Ad Routes
/////////////////////////////
/// Crashed routes
        // Route::get('admin/commerce/{slug}','CommerceController@commerce')->name('commerce_departments');
        //Route::resource('commerce_departments', 		'Admin\CommerceController');
        
        // Route::post('admin/departments/{commerce_slug}/','Admin\DepartmentController@create')->name('department');
            //Route::resource('products', 		'Admin\ProductController');
        //Relacion con mi commerce_id
/// Crashed routes

   // });
