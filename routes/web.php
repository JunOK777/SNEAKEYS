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

// top
Route::get('/', 'TopController@index');
Route::group(['middleware' => ['auth']], function () {
	// create_image
	Route::get('/create', 'CreateImageController@create')->name('create');
	Route::post('/store', 'CreateImageController@store')->name('store');

// image
Route::group(['prefix' => '/image/', 'as' => 'image.'], function () {
	Route::get('/{image}',         'ImageController@show')->name('show');
	Route::post('/{image}/review', 'ReviewController@reviewPost')->name('review.post');
	// size
	Route::post('/{image}/small/null', 'SizeController@smallNull');
	Route::post('/{image}/small/small', 'SizeController@smallSmall');
	Route::post('/{image}/small/other', 'SizeController@smallOther');
	Route::post('/{image}/just/null', 'SizeController@justNull');
	Route::post('/{image}/just/just', 'SizeController@justJust');
	Route::post('/{image}/just/other', 'SizeController@justOther');
	Route::post('/{image}/large/null', 'SizeController@largeNull');
	Route::post('/{image}/large/large', 'SizeController@largeLarge');
	Route::post('/{image}/large/other', 'SizeController@largeOther');
	// want have
	Route::post('{image}/want/null', 'CreateWanthaveController@wantNull');
	Route::post('{image}/want/0', 'CreateWanthaveController@want0');
	Route::post('{image}/want/1', 'CreateWanthaveController@want1');
	Route::post('{image}/have/null', 'CreateWanthaveController@haveNull');
	Route::post('{image}/have/0', 'CreateWanthaveController@have0');
	Route::post('{image}/have/1', 'CreateWanthaveController@have1');
});

// mypage
Route::get('/mypage',                       'UserController@mypage')->name('mypage');
Route::get('/mypage/name',                  'UserController@name');
Route::get('/mypage/change_adress',         'UserController@change_adress');
Route::get('/mypage/avatar_upload',         'UserController@avatar_upload');
Route::post('mypage/store_avatar',          'UserController@store_avatar')->name('store_avatar');
Route::post('/mypage/change_adress/change', 'UserController@change_email')->name('change_email');
Route::post('/mypage/name/change_name',     'UserController@change_name')->name('change_name');

// search
Route::get('/search', 'SearchController@search')->name('search');
Route::get('/tag', 'SearchController@tagSearch')->name('tag.search');

// contact
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::get('/report',  'ContactController@report')->name('report');

//more_page
Route::get('/more_news',       'MorePageController@news')->name('news');
Route::get('/more_reccomends', 'MorePageController@reccomends')->name('reccomends');
Route::get('/more_mylist',     'MorePageController@moreMylist')->name('moreMylist');

// delete
Route::delete('/{image}/delete', 'TopController@destroy')->name('delete');

// like
Route::post('/review/{review}/like',   'ReviewLikeController@postLike');
Route::post('/review/{review}/unlike', 'ReviewLikeController@unlike');
Route::post('/review/{review}/count',  'ReviewLikeController@getLikeCount');
});
