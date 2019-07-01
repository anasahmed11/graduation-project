<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
    /* patient views*/
    Route::get('/find-map','DoctorsController@map_index_api');
    Route::get('/find-doctor','DoctorsController@find_doctor_api');
    Route::post('/find-doctor','VisitsController@store');
    Route::get('/history','VisitsController@index_api');
    Route::post('/history/{id}','RatesController@update');
    Route::get('/bookings','VisitsController@booking_index_api');
    /*doctors views*/
    Route::get('/profile','DoctorsController@map_index_api');
    Route::post('/profile/{id}','DoctorsController@update');
    Route::post('/price/{id}','VisitPricesController@store');
    Route::post('/price2/{id}','VisitPricesController@store_price');
    Route::get('/my-bookings','VisitsController@doctor_bookings_api');
    Route::get('/my-history','VisitsController@doctor_history_api');
    Route::post('/my-history','VisitNotesController@store');
    Route::get('/current_user', function (){
        return \Illuminate\Support\Facades\Auth::user();
    });
});

Auth::guard('api')->user(); // instance of the logged user


Route::post('/register', 'AuthController@create');

Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::post('/contact-us','ReviewsController@store');
Route::post('/newdoctor','DoctorRequestsController@store');
Route::get('/blog-api','BlogApiController@index');
Route::get('/blog-api/{id}','BlogApiController@show');




