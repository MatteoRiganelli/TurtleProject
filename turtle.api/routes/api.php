<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

Route::get('prove', 'ProveController@index');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth',
], function () {
    Route::auth();
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logoutWithEmail', 'AuthController@logoutWithEmail');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('user', 'AuthController@user');
        Route::get('logout', 'AuthController@logout');

        /*Chat urls*/
        Route::get('v1/user-list', 'UserController@getUserList');
        Route::post('v1/get-user-conversation', 'ChatController@getUserConversationById');
        Route::post('v1/chat-save', 'ChatController@saveUserChat');

        /*Mountain urls*/
        Route::group([
            'prefix' => 'v1/mountain'
        ], function () {
            Route::post('insert', 'MountainController@insert');
            Route::get('get-all', 'MountainController@getAll');
            Route::post('insert-rating', 'RatingController@insertRating');
        });

        //Private Message urls
        Route::post('get-private-message-notifications', 'PrivateMessageController@getUserNotifications');
        Route::post('get-private-messages', 'PrivateMessageController@getPrivateMessages');
        Route::post('get-private-message', 'PrivateMessageController@getPrivateMessageById');
        Route::post('get-private-message-sent', 'PrivateMessageController@getPrivateMessageSent');
        Route::post('send-private-message', 'PrivateMessageController@sendPrivateMessage');

        Route::get('current_tasks', 'TaskController@index');
        Route::get('archived_tasks', 'TaskController@archived');
        Route::post('create_task', 'TaskController@store');
        Route::post('delete_task', 'TaskController@destroy');
        Route::post('archive_task/{id}', 'TaskController@archive');
        Route::post('edit_task', 'TaskController@edit');



    });


});

Route::post('forgot-password', 'UserController@forgotPassword');
Route::post('reset-password', 'UserController@resetPassword');




Route::group(['middleware' => ['auth:api']], function() {
    Route::get('/index', 'HomeController@index');

});

//FOR IMAGE UPLOAD
Route::post('/uploadImageAvatar', 'UploadController@uploadAvatarImage');
//FOR DATE COUNTING
Route::post('/foundDate', 'UtilityController@foundDatefromDate');


