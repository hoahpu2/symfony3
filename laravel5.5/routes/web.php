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
	return view('welcome');
});

Route::get('hoa123', function () {
	$url = 'resources/upload/product/product.rar';
	return Response::download($url);
});

Route::get('admin',['as'=>'admin.dangnhap','uses'=>'UserController@getdangnhapAdmin']);
Route::post('admin',['as'=>'admin.dangnhap','uses'=>'UserController@postdangnhapAdmin']);
Route::get('admin/logout',['as'=>'admin.dangxuat','uses'=>'UserController@getdangxuatAdmin']);

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'cate'],function(){
		Route::get('index',['as'=>'admin.cate.index','uses'=>'CateController@index']);
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('index',['as'=>'admin.product.index','uses'=>'ProductController@index']);
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
	});
	Route::group(['prefix'=>'slider'],function(){
		Route::get('index',['as'=>'admin.slider.index','uses'=>'SliderController@index']);
		Route::get('add',['as'=>'admin.slider.getAdd','uses'=>'SliderController@getAdd']);
		Route::post('add',['as'=>'admin.slider.postAdd','uses'=>'SliderController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.slider.getDelete','uses'=>'SliderController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.slider.getEdit','uses'=>'SliderController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.slider.postEdit','uses'=>'SliderController@postEdit']);
	});
	Route::group(['prefix'=>'news'],function(){
		Route::get('index',['as'=>'admin.news.index','uses'=>'NewsController@index']);
		Route::get('add',['as'=>'admin.news.getAdd','uses'=>'NewsController@getAdd']);
		Route::post('add',['as'=>'admin.news.postAdd','uses'=>'NewsController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.news.getDelete','uses'=>'NewsController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.news.getEdit','uses'=>'NewsController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.news.postEdit','uses'=>'NewsController@postEdit']);
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('index',['as'=>'admin.user.index','uses'=>'UserController@index']);
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
	});
});

