<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', [
    'as'    =>  'index',
    'uses'  =>  'HomeController@index'
] );

Route::get('/comment/new', [
    'as'    =>  'new_comment',
    'uses'  =>  'CommentsController@show_AddForm'
] );

Route::post('/comment/new', [
    'as'    =>  'save_comment',
    'uses'  =>  'CommentsController@save'
] );

Route::get('/all_users', [
    'as'    =>  'all_users',
    'uses'  =>  'CommentsController@show_all'
] );

Route::get('/transfer', [
    'as'    =>  'get_transfer',
    'uses'  =>  'TransferController@get_transfer'
] );

Route::post('/transfer', [
    'as'    =>  'post_transfer',
    'uses'  =>  'TransferController@post_transfer'
] );
