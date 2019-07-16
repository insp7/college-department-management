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

Route::middleware(['auth'])->group(function () {

        // // Student Courses; later move to staff routes!
        // Route::get('/student-courses/get-student-courses', 'StudentCourseController@getStudentCourses');
        // Route::resource('/student-courses', 'StudentCourseController');

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
        Route::group(['middleware'=> ['role:Staff|Admin']], function () {

                /*ROUTES TO COMPLETE REGISTRATION*/
                Route::get('/staff/fill-details', 'StaffController@fillDetails');
                Route::post('/staff/complete-registration', 'StaffController@completeRegistration');

                /**
         * Staff Routes When Registration Completed(is_fully_registered =1)
         */
                Route::group(['middleware'=> ['staff_registration']], function () {


                        // events to manage
                        Route::get('/events/manage/{staff}', 'EventsController@getEventsByStaffId');
                        Route::get('/events/end-event/{event}/end', 'EventsController@getEndEventForm');
                        Route::post('/events/end/{event}', 'EventsController@endEvent'); // change this to get request if required.
                        Route::get('/events/{event}/publish-as-news/', 'EventsController@publishAsNews');

                        // event images
                        Route::get('/events/images/{event}/show', 'EventsController@getEventImages');


                        /*Published Books*/
                        Route::get('/published-books/get-published-books', 'PublishedBookController@getPublishedBooks');
                        Route::resource('/published-books', 'PublishedBookController');


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



                        /**
             * Admin Routes
             */
                        Route::group(['middleware'=> ['role:Admin']], function () {
                                /*STAFF ROUTES*/

                                Route::get('/admin/staff/get-unregistered-staff', 'StaffController@getUnRegisteredStaff');
                                Route::get('/admin/staff/get-registered-staff', 'StaffController@getRegisteredStaff');
                                Route::resource('/admin/staff', 'StaffController');

                                // Events
                                Route::post('/admin/events/{id}/coordinators/add', 'EventsController@addCoordinator');
                                Route::get('/admin/events/{event}/assign-coordinator', 'EventsController@assignCoordinator');
                                Route::get('/admin/events/get-events', 'EventsController@getEvents');
                                Route::resource('/admin/events', 'EventsController');

                                /*STUDENT ROUTES*/



                                /*CLASS ROUTES*/
                                Route::get('/classes/{id}/get-students', 'ClassController@getClassStudents');
                                Route::get('/classes/get-classes', 'ClassController@getClasses');
                                Route::get('classes/{id}/students/create', 'ClassController@createClassStudents');
                                
                                Route::post('classes/{id}/students/store', 'ClassController@storeClassStudents');

                                Route::resource('/classes', 'ClassController');

                                Route::get('/student/add', 'StudentController@retriveClasses');
                                Route::resource('/student', 'StudentController');
                            }

                        );
                    }

                );
            }

        );

        /**
     * Student Routes
     */
        Route::group(['middleware'=> ['role:Student']], function () {

                // /*ROUTES TO COMPLETE REGISTRATION*/
                // Route::get('/student/fill-details', 'StaffController@fillDetails');
                // Route::post('/student/complete-registration', 'StaffController@completeRegistration');

                /*Student Internship*/
                Route::resource('/student-internship', 'StudentInternshipController');
                Route::get('/studnet-internship/get-student-internship', 'StudentInternshipController@getStudentInternships');

                // Student Courses; later move to staff routes!
                Route::get('/student-courses/get-student-courses', 'StudentCourseController@getStudentCourses');
                Route::resource('/student-courses', 'StudentCourseController');


                // Profile
                Route::get('/profile', 'UserController@myProfile');
                Route::get('/staff/edit', 'StaffController@staffEdit');



            }

        );
    }

);
Auth::routes();
