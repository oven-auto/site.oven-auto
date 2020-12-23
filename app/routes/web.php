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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::resource('brands','Brand\BrandController');
	Route::resource('marks','Mark\MarkController');
	Route::resource('properties','Property\PropertyController');
	Route::resource('colors','Color\ColorController');
	Route::resource('options','Option\OptionController');
	Route::resource('motors','Motor\MotorController');
	Route::resource('packs','Pack\PackController');

	Route::group(['prefix'=>'ajax','namespace'=>'Ajax'],function(){
		Route::group(['prefix'=>'get','namespace'=>'Get'],function(){
			Route::post('marks','MarkController@getMarksByBrand')->name('ajax.get.mark');
			Route::post('options/brand','OptionController@getOptionByBrand')->name('ajax.get.option');
			Route::post('options/all','OptionController@getOptionAll')->name('ajax.get.option.all');
		});

		Route::put('/mark/sort/{mark}','MarkAjaxController@sort')->name('ajax.mark.sort');
		Route::put('/mark/status/{mark}','MarkAjaxController@status')->name('ajax.mark.status');
		Route::post('/mark/colors','MarkColorController@get')->name('ajax.mark.color.get');
	});
});
