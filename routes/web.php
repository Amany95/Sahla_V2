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

//Route for Admin Panel 

Route::group(['prefix' => 'admin'], function()
{
    Route::resource('clients', "Admin\ClientController");
    Route::resource('blog', "Admin\BlogController");
    Route::get('android','Admin\AndroidController@create')->name('admin.android');
	Route::PUT('android','Admin\AndroidController@update')->name('admin.android');
	Route::get('ios','Admin\IosController@create')->name('admin.ios');
	Route::put('ios','Admin\IosController@update')->name('admin.ios');	
	Route::get('contact_us','Admin\ContactusController@create')->name('admin.contact');
	Route::post('contact_us','Admin\ContactusController@update')->name('admin.contact');

	Route::get('test','Admin\ContactusController@test')->name('admin.test');
	Route::post('test','Admin\ContactusController@store_test')->name('admin.test');



	Route::post('contact_us/{id}','Admin\ContactusController@update');
	Route::get('services','Admin\ServiceController@create');
	Route::post('handymen/{id}','Admin\ServiceController@update_handymen');
	Route::post('professional/{id}','Admin\ServiceController@update_professional');
	Route::post('companies/{id}','Admin\ServiceController@update_companies');
	Route::get('msg','Admin\MsgController@index');

	Route::get('login','Admin\LoginController@create')->name('admin.login'); 
	Route::post('login','Admin\LoginController@login')->name('admin.login');
	Route::post('register','Admin\LoginController@register')->name('admin.register');
	Route::get('register','Admin\LoginController@c_register')->name('admin.register');

	Route::get('logout','Admin\LoginController@logout')->name('admin.logout');

});




/*Route::get('/admin/app_services','Admin\App_ServicesController@create');
Route::post('/admin/app_services','Admin\App_ServicesController@store');

Route::get('/admin/cover_home','Admin\CoverController@create');
Route::post('/admin/cover_home','Admin\CoverController@storeimg');

Route::post('/admin/cover_img','Admin\CoverController@store_coverimg');
Route::post('/admin/cover_content','Admin\CoverController@store_content');

Route::get('/admin/welcome','Admin\ContentController@create');
Route::post('/admin/welcome','Admin\ContentController@store');

Route::get('/admin/feature','Admin\FeaturesController@create');
Route::post('/admin/feature_section','Admin\FeaturesController@store_section');
Route::post('/admin/feature_img','Admin\FeaturesController@store_img');







Route::get('/admin/cover_blog','Admin\CoverBlogController@create');
Route::post('/admin/cover_blog','Admin\CoverBlogController@store');
*/




/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
