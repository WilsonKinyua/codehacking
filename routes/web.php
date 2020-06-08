<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('post/{id}', ['as'=> 'home.post', 'uses'=>'AdminPostsController@post']);
Route::get('admin/comments/{$id}', ['as'=> 'comment.post', 'uses'=>'AdminPostsCommentsController@show']);
// Route::get('admin/comments/replies/{$id}', ['as'=> 'comments.replies', 'uses'=>'AdminPostsCommentsRepliesController@show']);


Route::group(['middleware' => ['adminauth']], function () {
    
    Route::get("admin", function(){ return view("admin.index");});
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/media', 'AdminMediaController');
    Route::resource('admin/comments', 'AdminPostsCommentsController');
    Route::resource('admin/comment/replies', 'AdminPostsCommentsRepliesController');
    
});

Route::group(['middleware' => ['auth']], function () {

    Route::post('comment/reply', "AdminPostsCommentsRepliesController@createReply");

});