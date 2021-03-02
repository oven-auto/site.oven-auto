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

Route::group(['namespace'=>'Front'],function(){
	Route::get('/','IndexController@index')->name('front.index');
	Route::get('pricelist/{slug}','PriceList\PriceListController@index')->name('front.pricelist');

	Route::group(['namespace'=>'Ajax','prefix'=>'ajax'],function(){
		Route::get('get/modelimage/model_id={id}/color_id={color_id?}','AjaxModelController@getModelImage')->name('front.ajax.get.modelimage');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function(){
	Route::resource('brands','Brand\BrandController');
	Route::resource('marks','Mark\MarkController');
	Route::resource('properties','Property\PropertyController');
	Route::resource('colors','Color\ColorController');
	Route::resource('options','Option\OptionController');
	Route::resource('motors','Motor\MotorController');
	Route::resource('packs','Pack\PackController');
	Route::resource('complects','Complect\ComplectController');
	Route::resource('cars','Car\CarController');

	Route::group(['prefix'=>'companies','namespace'=>'Company'], function(){
		Route::resource('/companies','CompanyController');
		Route::group(['prefix'=>'ajax'],function(){
			Route::get('/calculateforms','AjaxCompanyController@getScenarioEditForm')->name('company.get.scenario.list');
			Route::get('/conditions/{type}','AjaxCompanyController@getEmptyCondition')->name('company.get.condition');
		});
	});

	Route::resource('credits','Credit\CreditController');

	//Ресурс банеров
	Route::resource('banners','Banner\BannerController');
	//Маршрут для сортировки банеров
	Route::put('ajax/banners/sort','Banner\AjaxBannerController@sort')->name('ajax.banners.sort');

	//Русурс ярлыков
	Route::resource('shortcuts','Shortcut\ShortcutController');
	//Маршрут для сортировки банеров
	Route::put('ajax/shortcuts/sort','Shortcut\AjaxShortcutController@sort')->name('ajax.shortcuts.sort');

	Route::group(['prefix'=>'ajax','namespace'=>'Ajax'],function(){
		Route::group(['prefix'=>'get','namespace'=>'Get'],function(){

			Route::post('brand/marks/{single?}','MarkGetController@getMarksByBrand')->name('ajax.get.mark');
			Route::post('brand/options','OptionGetController@getOptionByBrand')->name('ajax.get.option');
			Route::post('all/options','OptionGetController@getOptionAll')->name('ajax.get.option.all');

			Route::post('mark/complects','ComplectGetController@getComplectByMark')->name('ajax.get.complect');
			Route::post('complect/colors','ColorGetController@getColorByComplect')->name('ajax.get.complect.color');
			Route::post('complect/packs','PackGetController@getPackByComplect')->name('ajax.get.complect.pack');
			//Возвращает список пакетов опций закреплёных за цветом в комплектации
			Route::post('complect/color/packs','ComplectGetController@getColorPack')->name('ajax.get.complect.color.pack');

			Route::post('brand/packs','PackGetController@getPackByBrand')->name('ajax.get.pack');
			Route::post('brand/motors','MotorGetController@getMotorByBrand')->name('ajax.get.motor');
			Route::post('mark/colors','ColorGetController@get')->name('ajax.mark.color.get');

			Route::post('car/view','CarGetController@getView')->name('ajax.get.car.view');
		});

		Route::group(['prefix'=>'set','namespace'=>'Set'],function(){
			Route::put('/mark/sort/{mark}','MarkAjaxController@sort')->name('ajax.mark.sort');
			Route::put('/mark/status/{mark}','MarkAjaxController@status')->name('ajax.mark.status');
			Route::put('/complect/status/{complect}','ComplectAjaxController@status')->name('ajax.complect.status');
		});
		
	});
});
