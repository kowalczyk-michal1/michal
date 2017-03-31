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

Route::group([

    'middleware' => 'roles',
    'roles' => 'User'

], function() {

    //TASKS

    Route::get('todo', [
        'uses' => 'TodoController@index',
        'as' => 'todo.index'
    ]);

    Route::get('todo/show', [
        'uses' => 'TodoController@show',
        'as' => 'todo.show'
    ]);

    Route::get('todo/create', [
        'uses' => 'TodoController@create',
        'as' => 'todo.create'
    ]);

    Route::post('todo/store', [
        'uses' => 'TodoController@store',
        'as' => 'todo.store'
    ]);

    Route::get('todo/edit/{task}', [
        'uses' => 'TodoController@edit',
        'as' => 'todo.edit'
    ]);

    Route::put('todo/{task}', [
        'uses' => 'TodoController@update',
        'as' => 'todo.update'
    ]);

    Route::get('todo/completed/{task}', [
        'uses' => 'TodoController@completed',
        'as' => 'todo.completed'
    ]);

    Route::delete('todo/{task}', [
        'uses' => 'TodoController@destroy',
        'as' => 'todo.delete'
    ]);


    // NOTES

    Route::get('notes', [
        'uses' => 'NotesController@index',
        'as' => 'notes.index'
    ]);

    Route::get('notes/create', [
        'uses' => 'NotesController@create',
        'as' => 'notes.create'
    ]);

    Route::post('Notes/store', [
        'uses' => 'NotesController@store',
        'as' => 'notes.store'
    ]);

    Route::delete('notes/{note}', [
        'uses' => 'NotesController@destroy',
        'as' => 'notes.delete'
    ]);

    Route::get('notes/edit/{note}', [
        'uses' => 'NotesController@edit',
        'as' => 'notes.edit'
    ]);

    Route::put('notes/{note}', [
        'uses' => 'NotesController@update',
        'as' => 'notes.update'
    ]);

    Route::get('notes/show', [
        'uses' => 'NotesController@show',
        'as' => 'notes.show'
    ]);


    //To collect
    Route::get('tocollect/create', [
        'uses' => 'ToCollectController@create',
        'as' => 'tocollect.create'
    ]);

    Route::get('tocollect', [
        'uses' => 'ToCollectController@index',
        'as' => 'tocollect.index'
    ]);

    Route::post('tocollect/store', [
        'uses' => 'ToCollectController@store',
        'as' => 'tocollect.store'
    ]);

    Route::delete('tocollect/{row}', [
        'uses' => 'ToCollectController@destroy',
        'as' => 'tocollect.delete'
    ]);

    Route::get('tocollect/edit/{row}', [
        'uses' => 'ToCollectController@edit',
        'as' => 'tocollect.edit'
    ]);

    Route::put('tocollect/{row}', [
        'uses' => 'ToCollectController@update',
        'as' => 'tocollect.update'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
