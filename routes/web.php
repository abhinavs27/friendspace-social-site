<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [
    'middleware' => 'test',
    'uses' => 'UserController@showHome',
    'as' => 'home',
]);

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('test')->name('home');


Route::post('signup','UserController@postSignUp')->name('signup');


Route::get('/dashboard', [
    'middleware' => ['auth'],
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    ]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin',
    ]);
    

 Route::get('/logout', [
        'uses' => 'UserController@getLogOut',
        'as' => 'logout',
]);    


Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account',
]); 
Route::post('/useraccount', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save',
]); 

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);

    Route::post('/createpost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'post.create',
        'middleware' => ['auth'],
        ]);


    
        Route::get('/delete-post/{post_id}', [
            'uses' => 'PostController@getDeletePost',
            'as' => 'post.delete',
            'middleware' => ['auth'],
            ]);

 Route::post('/edit', [
        'uses' => 'PostController@postEditPost',
        'as' => 'edit',
    ]);

    
    Route::post('/like', [
        'uses' => 'PostController@postLiketPost',
        'as' => 'like',
    ]);
