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

/**
 * A group that first authenticates the user and if the user is not authenticated then redirects him/her to the login page.
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    /**
     * General Routes
     */
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


    /*ADMIN ROUTES*/
    Route::group(['middleware' => ['role:Admin']], function () {
        //
        /**
         * Staff Routes
         */
        Route::resource('/admin/staff', 'StaffController');
    });

    /*STAFF ROUTES*/
    Route::group(['middleware' => ['role:Staff']], function () {
        //
        /**
         * Staff Routes
         */

        Route::get('/staff/edit', 'StaffController@edit');
        Route::group(['middleware' => ['staff_registration']], function () {
            //
            /**
             * Staff Registration  Routes
             */
        });

    });


});


Auth::routes();

