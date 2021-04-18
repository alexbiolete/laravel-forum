<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'uses' => 'PagesController@index',
    'as' => 'index'
]);

Auth::routes();

Route::get('/forum', [
    'uses' => 'ForumsController@index',
    'as' => 'forum'
]);

Route::get('/discussion/{slug}', [
    'uses' => 'DiscussionsController@show',
    'as' => 'discussion.show'
]);

    Route::get('/channel/{slug}', [
        'uses' => 'ChannelsController@show',
        'as' => 'channel.show'
    ]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channel', 'ChannelsController');
    
    Route::get('/discussions/create', [
        'uses' => 'DiscussionsController@create',
        'as' => 'discussion.create'
    ]);

    Route::post('/discussions/store', [
        'uses' => 'DiscussionsController@store',
        'as' => 'discussion.store'
    ]);

    Route::post('/discussions/{id}/reply', [
        'uses' => 'DiscussionsController@reply',
        'as' => 'discussion.reply'
    ]);

    Route::get('/reply/{id}/like', [
        'uses' => 'RepliesController@like',
        'as'=> 'reply.like'
    ]);

    Route::get('/reply/{id}/unlike', [
        'uses' => 'RepliesController@unlike',
        'as'=> 'reply.unlike'
    ]);

    Route::get('/discussion/{id}/watch', [
        'uses' => 'WatchersController@watch',
        'as' => 'discussion.watch'
    ]);

    Route::get('/discussion/{id}/unwatch', [
        'uses' => 'WatchersController@unwatch',
        'as' => 'discussion.unwatch'
    ]);

    Route::get('/discussion/{id}/best-answer', [
        'uses' => 'RepliesController@best_answer',
        'as' => 'discussion.best.answer'
    ]);

    Route::get('/discussion/{slug}/edit', [
        'uses' => 'DiscussionsController@edit',
        'as' => 'discussion.edit'
    ]);

    Route::post('/discussion/{id}/update', [
        'uses' => 'DiscussionsController@update',
        'as' => 'discussion.update'
    ]);

    Route::get('/reply/{id}/edit', [
        'uses' => 'RepliesController@edit',
        'as' => 'reply.edit'
    ]);

    Route::post('/reply/{id}/update', [
        'uses' => 'RepliesController@update',
        'as' => 'reply.update'
    ]);
});
