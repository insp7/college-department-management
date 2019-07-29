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




Route::middleware(['auth'])->group(function () {

        /*GENERAL ROUTES*/


        Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

        Route::get('/news-feed/view-all-news', 'NewsFeedController@showAllNewsFeeds');


        /*STAFF ROUTES*/
        Route::group(['middleware'=> ['role:Staff|Admin']], function () {




                /*ROUTES TO COMPLETE REGISTRATION*/
                Route::get('/staff/fill-details', 'StaffController@fillDetails');
                Route::post('/staff/complete-registration', 'StaffController@completeRegistration');


         /*Staff Routes When Registration Completed(is_fully_registered =1)*/
                Route::group(['middleware'=> ['staff_registration']], function () {


                    Route::redirect('/', '/dashboard');
                    Route::get('/dashboard', 'DashboardController@index');

                    Route::get('/timeline', 'UserController@timeline');
                    Route::get('/profile', 'UserController@myProfile');

                    Route::get('/notification/mark-all-as-read', 'NotificationController@markAllAsRead');

                    // events to manage
                    Route::get('/events/manage/{staff}', 'EventsController@getEventsByStaffId');
                    Route::get('/events/end-event/{event}/end', 'EventsController@getEndEventForm');
                    Route::post('/events/end/{event}', 'EventsController@endEvent'); // change this to get request if required.
                    Route::get('/events/{event}/publish-as-news/', 'EventsController@publishAsNews');

                    // event images
                    Route::get('/events/images/{event}/show', 'EventsController@getEventImages');


                    /*News Feed*/
                    Route::get('/news-feed/images/{id}/show', 'NewsFeedController@getImagesForNewsFeed');
                    Route::get('/news-feed/get-all-news-feeds', 'NewsFeedController@getAllNewsFeeds');
                    Route::resource('/news-feed', 'NewsFeedController');


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

                    // Scholarships
                    Route::get('/scholarships/get-scholarships', 'StudentScholarshipController@getStudentScholarships');
                    //Route::get('/scholarships/edit', 'StudentScholarshipController@edit');
                    Route::resource('/scholarships', 'StudentScholarshipController');

                        /*ADMIN ROUTES*/
                        Route::group(['middleware'=> ['role:Admin']], function () {
                                /*STAFF ROUTES*/

                                Route::get('/admin/staff/get-unregistered-staff', 'StaffController@getUnRegisteredStaff');
                                Route::get('/admin/staff/get-registered-staff', 'StaffController@getRegisteredStaff');
                                Route::resource('/admin/staff', 'StaffController');

                                // Events
                                Route::delete('/admin/event/{event}/coordinator/{coordinator}/delete', 'EventsController@removeCoordinator');
                                Route::get('/admin/events/{event}/view-coordinators', 'EventsController@viewCoordinators');
                                Route::get('/admin/events/{event}/get-coordinators', 'EventsController@getCoordinators');
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

                                // Add the table view routes for managing news here

                                // Adding news_feed_images route

                            }

                        );
                    }

                );
            }

        );

        /*STUDENT ROUTES*/
        Route::group(['middleware'=> ['role:Student']], function () {

                // /*ROUTES TO COMPLETE REGISTRATION*/
                // Route::get('/student/fill-details', 'StaffController@fillDetails');
                // Route::post('/student/complete-registration', 'StaffController@completeRegistration');

                /*Student Internship*/
                Route::get('/student-internship/get-student-internship', 'StudentInternshipController@getStudentInternships');
                Route::resource('/student-internship', 'StudentInternshipController');


                // Student Courses; later move to staff routes!
                Route::get('/student-courses/get-student-courses', 'StudentCourseController@getStudentCourses');
                Route::resource('/student-courses', 'StudentCourseController');

                // Scholarships
                Route::get('/student-scholarships/get-scholarships', 'StudentScholarshipController@getStudentScholarships');
                Route::resource('/student-scholarships', 'StudentScholarshipController');

                // Further Studies
                Route::get('/student-further-studies/get-furtherstudies', 'StudentFurtherStudiesController@getStudentFurtherStudies');
                Route::patch('/student-further-studies/{id}', 'StudentFurtherStudiesController@update');
                Route::resource('/student-further-studies', 'StudentFurtherStudiesController');

            }
        );
    }

);
Auth::routes();
