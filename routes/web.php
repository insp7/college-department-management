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





//Route::get('/notification', 'StaffController@showNotification');



Route::middleware(['auth'])->group(function() {
    /**
     * General Routes
     */
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/timeline', 'UserController@timeline');
    Route::resource('/news-feed', 'NewsFeedController');

    /**
     * Staff Routes
     */
    Route::group(['middleware' => ['role:Staff|Admin']], function () {


        /*ROUTES TO COMPLETE REGISTRATION*/
        Route::get('/staff/fill-details', 'StaffController@fillDetails');
        Route::post('/staff/complete-registration', 'StaffController@completeRegistration');

        /**
         * Staff Routes When Registration Completed(is_fully_registered =1)
         */
        Route::group(['middleware' => ['staff_registration']], function () {


            Route::get('/profile', 'UserController@myProfile');
            Route::get('/staff/edit', 'StaffController@staffEdit');



            /*Published Books*/
            Route::get('/published-books/get-published-books', 'PublishedBookController@getPublishedBooks');
            Route::resource('/published-books', 'PublishedBookController');


            /**
             * Admin Routes
             */
            Route::group(['middleware' => ['role:Admin']], function () {
                /*STAFF ROUTES*/

                Route::get('/admin/staff/get-unregistered-staff', 'StaffController@getUnRegisteredStaff');
                Route::get('/admin/staff/get-registered-staff', 'StaffController@getRegisteredStaff');
                Route::resource('/admin/staff', 'StaffController');

                /*CLASS ROUTES*/
                Route::get('/classes/get-classes', 'ClassController@getClasses');

                Route::get('classes/{id}/students/create', 'ClassController@createClassStudents');
                Route::post('classes/{id}/students/store', 'ClassController@storeClassStudents');

                Route::resource('/classes', 'ClassController');

            });

        });

    });

});

Auth::routes();

