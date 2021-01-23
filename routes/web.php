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

// Registration Form //
Route::get('/user-registration',[
    'uses'=>'UserRegisterController@showRegisterForm',
    'as'    =>'user-registration'
])->middleware('auth');

Route::post('/user-registration',[
    'uses'=>'UserRegisterController@userSave',
    'as'    =>'user-save'
])->middleware('auth');

Route::get('/user-list',[
    'uses'=>'UserRegisterController@userList',
    'as'    =>'user-list'
])->middleware('auth');

Route::get('/user-profile/{userId}',[
    'uses'  =>'UserRegisterController@userProfile',
    'as'    =>'user-profile'
]);

Route::get('/change-user-info/{id}',[
    'uses'  =>'UserRegisterController@changeUserInfo',
    'as'    =>'change-user-info'
]);

Route::post('/user-save-info',[
    'uses'  =>'UserRegisterController@userSaveInfo',
    'as'    =>'user-save-info'
]);

Route::get('/change-user-avatar/{id}',[
    'uses'  =>'UserRegisterController@changeUserAvatar',
    'as'    =>'change-user-avatar'
]);
Route::post('/update-user-avatar',[
    'uses'  =>'UserRegisterController@updateUserAvatar',
    'as'    =>'update-user-avatar'
]);

Route::get('/update-user-password/{id}',[
    'uses'  =>'UserRegisterController@updateUserPassword',
    'as'    =>'update-user-password'
]);

Route::Post('/user-password-update',[
    'uses'  =>'UserRegisterController@userPasswordUpdate',
    'as'    =>'user-password-update'
]);

/*slider Area */
Route::get('add-slider',[
    'uses'  => 'SliderController@addSlider',
    'as'    =>'add-slider'
]);
Route::post('upload-slide',[
    'uses'  => 'SliderController@uploadSlide',
    'as'    =>'upload-slide'
]);
Route::get('/manage-slide',[
    'uses'  => 'SliderController@manageSlide',
    'as'    =>'manage-slide'
]);
Route::get('/slide-unpublished/{id}',[
    'uses'  => 'SliderController@slideUnpublished',
    'as'    =>'slide-unpublished'
]);

Route::get('/slide-published/{id}',[
    'uses'  => 'SliderController@slidePublished',
    'as'    =>'slide-published'
]);

Route::get('/slide-update/{id}',[
    'uses'  => 'SliderController@slideUpdate',
    'as'    =>'slide-update'
]);

Route::post('/update-slide',[
    'uses'  => 'SliderController@updateSlide',
    'as'    =>'update-slide'
]);

Route::get('/slide-delete/{id}',[
    'uses'  => 'SliderController@slideDelete',
    'as'    =>'slide-delete'
]);

Route::get('/photo-gallery',[
    'uses'  => 'SliderController@photoGallery',
    'as'    =>'photo-gallery'
]);

/*slider Area */

/*School Management system  Start*/

/* School section Management */

Route::get('/school/add',[
    'uses'=> 'SchoolManagementController@addSchool',
    'as'    =>'add-school'
]);
Route::post('/school/add',[
    'uses'=> 'SchoolManagementController@schoolNameSave',
    'as'    =>'school-name-save'
]);
Route::get('/school/list',[
    'uses'=> 'SchoolManagementController@schoolList',
    'as'    =>'school-list'
]);
Route::get('/school/unpublished/{id}',[
    'uses'=> 'SchoolManagementController@schoolUnpublished',
    'as'    =>'school-unpublished'
]);

Route::get('/school/published/{id}',[
    'uses'=> 'SchoolManagementController@schoolPublished',
    'as'    =>'school-published'
]);
Route::get('/edit/school/{id}',[
    'uses'=> 'SchoolManagementController@editSchool',
    'as'    =>'edit-school'
]);

Route::post('/update/school',[
    'uses'=> 'SchoolManagementController@updateSchoolName',
    'as'    =>'update-school-name'
]);

Route::get('/school/delete/{id}',[
    'uses'=> 'SchoolManagementController@schoolDelete',
    'as'    =>'school-delete'
]);

/* School section Management */

/* Class section Management */

Route::get('/add-class',[
    'uses'=> 'ClassManagementController@addClass',
    'as'    =>'add-class'
]);
Route::post('/add-class-save',[
    'uses'=> 'ClassManagementController@addClassSave',
    'as'    =>'add-class-save'
]);
Route::get('/class-list',[
    'uses'=> 'ClassManagementController@classList',
    'as'    =>'class-list'
]);

Route::get('/class-unpublished/{id}',[
    'uses'=> 'ClassManagementController@classUnpublished',
    'as'    =>'class-unpublished'
]);

Route::get('/class-published/{id}',[
    'uses'=> 'ClassManagementController@classPublished',
    'as'    =>'class-published'
]);
Route::get('/edit-class/{id}',[
    'uses'=> 'ClassManagementController@editClass',
    'as'    =>'edit-class'
]);
Route::post('/class-update-save',[
    'uses'=> 'ClassManagementController@classUpdateSave',
    'as'    =>'class-update-save'
]);
Route::get('/class-delete/{id}',[
    'uses'=> 'ClassManagementController@classDelete',
    'as'    =>'class-delete'
]);

/* Class section Management */
/* Batch section Management */


Route::get('/add-batch',[
    'uses'=> 'BatchManagementController@addBatch',
    'as'    =>'add-batch'
]);
Route::post('/add-batch-save',[
    'uses'=> 'BatchManagementController@addBatchSave',
    'as'    =>'add-batch-save'
]);

Route::get('/batch/list',[
    'uses'=> 'BatchManagementController@batchList',
    'as'    =>'batch-list'
]);
Route::get('/batch/list/ajax',[
    'uses'=> 'BatchManagementController@batchListByAjax',
    'as'    =>'batch-list-by-ajax'
]);
Route::get('/batch/unpublished',[
    'uses'=> 'BatchManagementController@batchUnpublished',
    'as'    =>'batch-unpublished'
]);
Route::get('/batch/published',[
    'uses'=> 'BatchManagementController@batchPublished',
    'as'    =>'batch-published'
]);
Route::get('/batch/delete',[
    'uses'=> 'BatchManagementController@batchDelete',
    'as'    =>'batch-delete'
]);
Route::get('/batch/edit/{id}',[
    'uses'=> 'BatchManagementController@batchEdit',
    'as'    =>'batch-edit'
]);
Route::post('/batch/update',[
    'uses'=> 'BatchManagementController@batchUpdate',
    'as'    =>'batch-update'
]);
/* Batch section Management  End*/

/* Student Type section Management Start */

ROute::get('/student-type',[
    'uses'=>'StudentTypeController@studentType',
    'as'=>'student-type'
]);
ROute::post('/student/type/save',[
    'uses'=>'StudentTypeController@studentTypeSave',
    'as'=>'student-type-save'
]);
ROute::get('/student/type/list',[
    'uses'=>'StudentTypeController@studentTypeList',
    'as'=>'student-type-list'
]);
ROute::get('/student-type-un-published',[
    'uses'=>'StudentTypeController@studentTypeUnPublished',
    'as'=>'student-type-un-published'
]);
ROute::get('/student-type-published',[
    'uses'=>'StudentTypeController@studentTypePublished',
    'as'=>'student-type-published'
]);
ROute::post('/student-type-update',[
    'uses'=>'StudentTypeController@studentTypeUpdate',
    'as'=>'student-type-update'
]);
ROute::get('/student-type-delete',[
    'uses'=>'StudentTypeController@studentTypeDelete',
    'as'=>'student-type-delete'
]);
/* Student Type section Management  End*/
/* Student section start*/
Route::get('/student/registration-form',[
    'uses'=>'StudentController@studentRegistrationForm',
    'as'=>'student-registration-form'
]);
/* Student section end*/
/* Class section Management */
/* Class section Management */
/* Class section Management */
/* Class section Management */
/*School Management system  End*/


/*--- Admin  ---*/

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
/*--- Admin  ---*/
