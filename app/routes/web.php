<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;


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

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('hotels', 'HotelController',['only' => ['index','show','destroy']]);
    Route::resource('reviews', 'ReviewController',['only' => ['create','show','store','edit']]);
    Route::resource('users', 'UserController',['only' => ['index','show','edit','update']]);
    Route::get('/review/new/{hotel}', 'ReviewController@review')->name('reviews.new');
    Route::get('/like', 'UserController@likeIndex')->name('likes.index');


    Route::post('/ajax_like', 'HotelController@ajaxLike');
    });
        // 管理者ユーザーのみ
    Route::group(['middleware' => ['auth', 'can:admin']], function () {
        Route::get('others', 'OtherController@index')->name('others.index');
        Route::get('others/create', 'OtherController@create')->name('others.create');
        Route::post('others', 'OtherController@store')->name('others.store');
        Route::resource('reviews', 'ReviewController',['only' => ['index','destroy']]);

    });








