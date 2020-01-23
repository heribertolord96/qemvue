<?php

use Illuminate\Http\Request;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::get('commerces', 'Admin\CommerceController@index');
Route::get('commerce\{commerce_slug}','Admin\CommerceController@show');