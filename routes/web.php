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
    return view('vue_container/vue_container');
});
Auth::routes();
//Routes from commerces
    Route::get('commerces', 		'Admin\CommerceController@index');
    Route::resource('commerces',         'Admin\CommerceController');
    Route::get('commerce\{commerce_slug}','Admin\CommerceController@show');
    Route::post('chained/department','Admin\CommerceController@department');
    Route::get('chained/department','Admin\CommerceController@department');
    Route::post('commerce/departments', 'Admin\DepartmentController@departments');
    Route::get('commerce/departments', 'Admin\DepartmentController@departments');
    Route::post('chained/category','Admin\CommerceController@category');
    Route::get('chained/category','Admin\CommerceController@category');
    Route::post('chained/product','Admin\CommerceController@product');
    Route::get('chained/product','Admin\CommerceController@product');
    //------------------
    
    //Obtiene los departamentos de una tienda
    Route::get('admin/{commerce_slug}/commerces', 'Admin\CommerceController@commerce')->name('commerce');
    Route::get('my_commerces', 'Admin\CommerceController@my_commerces');
    Route::post('commerce/store', 'Admin\CommerceController@store');
    Route::put('commerce/update', 'Admin\CommerceController@update');
    Route::get('commerce/categories', 'Admin\CategoryController@categories');
    //Commerce users
    Route::get('find/users', 		'Admin\CommerceUserController@index');//Buscar usuario
    Route::get('commerce/users', 		'Admin\CommerceUser@users');//Listar usuarios de 
    Route::post('commerce/users', 'Admin\CommerceUser@users');
    //Commerce users

//Routes from commerces
//Routes from departments
    Route::post('department/store', 'Admin\DepartmentController@store');
    Route::put('department/update', 'Admin\DepartmentController@update');
//Routes from departments
//Routes from categories
    Route::post('category/store', 'Admin\CategoryController@store');
    Route::put('category/update', 'Admin\CategoryController@update');
//Routes from categories
//Routes from departments
Route::post('product/store', 'Admin\ProductController@store');
Route::put('product/update', 'Admin\ProductController@update');
//Routes from departments

//Route::get('commerce_role_user', 'Admin\CommerceController@selectCommerceRoleUser');
//Relacion con mi  commerce_id

Route::resource('departments',         'Admin\DepartmentController');
//Department routes

//oldies... rap

//===================================================
Route::get('admin/tag/{slug}', 'Admin\TagController@tag')->name('tag');
Route::resource('tags',         'Admin\TagController');
//Commerce routes

//Commerce routes   
//Department routes

//Category routes
Route::get('admin/categories/{slug}', 'Admin\CategoryController@categories')->name('commerce_categories');
Route::resource('categories',         'Admin\CategoryController');
Route::get('admin/categories', 'Admin\CategoryController@categories')->name('categories');
Route::resource('categories',         'Admin\CategoryController');

//Category routes
//Product routes   

Route::get('admin/{slug}/myproducts', 'Admin\ProductController@myproducts')
    ->name('myproducts'); //Del metodo index
Route::get('admin/{slug}/products', 'Admin\ProductController@products')
    ->name('commerce_products'); //Del metodo index
//Route::resource('products', 		'Admin\ProductController');
Route::resource('products',         'Admin\ProductController@index');
Route::get('admin/product/{slug}', 'Admin\ProductController@show')
    ->name('product');
Route::resource('products',         'Admin\ProductController');
//Product routes 
//Promotion routes
Route::get('admin/promotion/{slug}', 'Admin\PromotionController@promotion')->name('promotion');
Route::resource('promotions',         'Admin\PromotionController');
//Promotion routes
//Event routes
Route::get('admin/event/{slug}', 'Admin\EventController@event')->name('event');
Route::resource('events',         'Admin\EventController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
