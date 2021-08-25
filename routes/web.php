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


Route::get('/', 'IndexController@index');
Route::get('biography', 'IndexController@bio');
Route::get('team', 'IndexController@team');


Route::get('terms', 'IndexController@terms');
Route::get('cookies', 'IndexController@cookies');
Route::get('impressum', 'IndexController@impressum');
Route::get('gallery', 'IndexController@gallery');
Route::get('services', 'IndexController@services');
Route::get('salons', 'IndexController@salons');
Route::get('appointments', 'IndexController@appointment');
Route::get('barber', 'IndexController@barber');
Route::get('editorial', 'IndexController@editorial');
Route::get('contact', 'ContactController@contact');
Route::get('miss', 'IndexController@miss');
Route::get('offers', 'IndexController@events');
Route::get('celebrity', 'IndexController@celebrity');
Route::get('lifestyle', 'IndexController@lifestyle');
Route::get('jobs', 'IndexController@jobs');

Route::get('/gallery-detail/{url_slug}','IndexController@gallery_detail');
Route::get('/service-detail/{url_slug}','IndexController@service_detail');
Route::get('/editorial-detail/{url_slug}','IndexController@editorial_detail');
Route::get('/salon-detail/{url_slug}','IndexController@salon_detail');
Route::get('/job-detail/{url_slug}','IndexController@job_detail');

Route::post('send-appointment','ContactController@send_appointment');
Route::post('send-contact','ContactController@send_contact');
Route::post('send-newsletter','ContactController@subscribeNewsletter');
Route::post('send-file','ContactController@submit_file');

Route::get('/storage/thumb/{query}/{file?}', 'ThumbController@index')
    ->where([
        'query' => '[A-Za-z0-9\:\;\-]+',
        'file'  => '[A-Za-z0-9\/\.\-\_]+',
    ])
    ->name('thumb');

    Route::get('locale/{locale}', function($locale) {
        Session::put('locale', $locale);
        return redirect()->back();
      });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
