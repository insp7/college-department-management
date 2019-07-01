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

        // Events
        Route::post('/admin/events/{id}/coordinators/add', 'EventsController@addCoordinator');
        Route::get('/admin/events/{event}/assign-coordinator', 'EventsController@assignCoordinator');
        Route::get('/admin/events/get-events', 'EventsController@getEvents');
        Route::resource('/admin/events', 'EventsController');
    });

    /*STAFF ROUTES*/
    Route::group(['middleware' => ['role:Staff']], function () {
        //
        /**
         * Staff Routes
         */


        // events to manage
        Route::get('/events/manage/{staff}', 'EventsController@getEventsByStaffId');
        Route::get('/events/end-event/{event}/end', 'EventsController@getEndEventForm');
        Route::post('/events/end/{event}', 'EventsController@endEvent');

        /*Published Books*/
        Route::get('/published-books/get-published-books', 'PublishedBooksController@getPublishedBooks');

        Route::resource('/published-books', 'PublishedBooksController');

        // Research Projects
        Route::get('/research-projects/get-research-projects', 'ResearchProjectsController@getResearchProjects');
        Route::resource('/research-projects', 'ResearchProjectsController');

        // IPRController
        Route::get('/ipr/get-ipr', 'IPRController@getIPR');
        Route::resource('/ipr', 'IPRController');

        // Publications
        Route::get('/publications/get-publications', 'PublicationsController@getPublications');
        Route::resource('/publications', 'PublicationsController');

        Route::get('/staff/fill-details', 'StaffController@fillDetails');

        Route::group(['middleware' => ['staff_registration']], function () {
            //
            /**
             * Staff Routes When Registration Completed(is_fully_registered =1)
             */

            Route::get('/staff/edit', 'StaffController@staffEdit');
        });

    });


});


Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
