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

Route::get('/','ViewsController@index');

Auth::routes();
/* main views */
Route::get('/start', 'HomeController@index');
Route::get('/blog','ViewsController@blog');
Route::get('/admin','DoctorsController@index')->middleware('auth');
Route::resource('views','ViewsController');
Auth::routes();

/*blog api */
Route::get('/blog-api','BlogApiController@index');
Route::get('/blog-api/{id}','BlogApiController@show');
Route::resource('blogApi','BlogApiController');
/* end blog api */

/* end main views*/

/* new doctor controllers */
Route::get('/newdoctor','ViewsController@doctor_request');
Route::post('/newdoctor','DoctorRequestsController@store');
Route::resource('doctor_requests','DoctorRequestsController');
/* end new doctor controllers */

/* contact-us controllers */
Route::get('/contact-us','ViewsController@contact_us');
Route::post('/contact-us','ReviewsController@store');
Route::resource('reviews','ReviewsController');
/* end contact-us controllers */


/* visit method */
Route::get('/visit-method','VisitMethodsController@index')->middleware('auth');
Route::resource('visit-method','VisitMethodsController');
Route::put('/visit-method/{id}','VisitMethodsController@update');
Route::get('/visit-method/{id}','VisitMethodsController@edit');
Route::delete('/visit-method/{id}','VisitMethodsController@destroy');
Route::post('/visit-method','VisitMethodsController@store');

/* pay method */

Route::get('/payment-method','PaymentMethodsController@index')->middleware('auth');
Route::resource('payment-method','PaymentMethodsController');
Route::put('/payment-method/{id}','PaymentMethodsController@update');
Route::delete('/payment-method/{id}','PaymentMethodsController@destroy');
Route::post('/payment-method','PaymentMethodsController@store');


/* doctor request */

Route::get('/doctor-request','DoctorRequestsController@index')->middleware('auth');
Route::delete('/doctor-request/{id}','DoctorRequestsController@destroy');


/* client reviews */
Route::get('/client-review','ReviewsController@index')->middleware('auth');


/* categories */

Route::get('/categories','CategoriesController@index')->middleware('auth');
Route::resource('categories','CategoriesController');
Route::put('/categories/{id}','CategoriesController@update');
Route::delete('/categories/{id}','CategoriesController@destroy');
Route::post('/categories','CategoriesController@store');

/* blog */

Route::get('/blog-page','BlogsController@index')->middleware('auth');
Route::resource('blog-page','BlogsController');
Route::post('/blog-page/{id}','BlogsController@update');
Route::delete('/blog-page/{id}','BlogsController@destroy');
Route::post('/blog-page','BlogsController@store');

/* doctor */
Route::resource('doctor','DoctorsController');


/* doctor views */



Route::resource('price','VisitPricesController');


/* locations */
Route::resource('locations','LocationsController');
Route::get('/locations','LocationsController@index');
Route::post('/locations','LocationsController@store');
Route::post('/locations/{id}','LocationsController@update');

/*patient views*/

Route::group(['middleware' => 'auth'], function () {
    /*find-doctor*/
    Route::get('/find-doctor','DoctorsController@find_doctor');
    /* doctor prices */
    Route::post('/price/{id}','VisitPricesController@store');
    Route::post('/price2/{id}','VisitPricesController@store_price');
    Route::post('/price-edit/{id}','VisitPricesController@update');
    Route::post('/price-edit2/{id}','VisitPricesController@update_price');
    /* doctor */
    Route::get('/profile','DoctorsController@profile');
    Route::post('/profile/{id}','DoctorsController@update');
    Route::post('/admin','DoctorsController@store');
    /*find map*/
    Route::get('/find-map','DoctorsController@map_index');
});



/*visit*/
Route::resource('visits','VisitsController');
Route::post('/find-doctor','VisitsController@store');
