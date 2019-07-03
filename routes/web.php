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

            // Profile
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
        
                // Events
                Route::post('/admin/events/{id}/coordinators/add', 'EventsController@addCoordinator');
                Route::get('/admin/events/{event}/assign-coordinator', 'EventsController@assignCoordinator');
                Route::get('/admin/events/get-events', 'EventsController@getEvents');
                Route::resource('/admin/events', 'EventsController');
            });

        });

    });

});

Auth::routes();

