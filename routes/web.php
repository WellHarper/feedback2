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

//feedback - inicio
Route::get('feedback/create', 'FeedbackController@create')->name('feedback.create');
Route::post('feedback/create', 'FeedbackController@store')->name('feedback.store');

Route::get('feedback/teste', 'FeedbackController@teste')->name('teste');

//feedback - Fim

//text2bin - inicio
Route::get('text2bin/create', 'Text2binController@create')->name('text2bin.create');
Route::post('text2bin/create', 'Text2binController@show')->name('text2bin.show');
//text2bin - inicio

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    //admin - inicio
    Route::prefix('admin')->group(function () {

        Route::get('item', 'ItemController@index')->name('item.index')->middleware('can:is_admin');
        Route::get('item/create', 'ItemController@create')->name('item.create')->middleware('can:is_admin');
        Route::post('item/create', 'ItemController@store')->name('item.store')->middleware('can:is_admin');
        Route::get('item/{id}', 'ItemController@show')->name('item.show')->middleware('can:is_admin');
        Route::get('item/{id}/edit', 'ItemController@edit')->name('item.edit')->middleware('can:is_admin');
        Route::put('item/{id}', 'ItemController@update')->name('item.update')->middleware('can:is_admin');
        Route::delete('item/{id}', 'ItemController@destroy')->name('item.destroy')->middleware('can:is_admin');

        Route::get('user', 'UserController@index')->name('user.index')->middleware('can:is_admin');//->middleware('permission:user-list|user-create|user-edit|user-delete');
        Route::get('user/create', 'UserController@create')->name('user.create')->middleware('can:is_admin');
        Route::post('user/create', 'UserController@store')->name('user.store')->middleware('can:is_admin');
        Route::get('user/{id}', 'UserController@show')->name('user.show')->middleware('can:is_admin');
        Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit')->middleware('can:is_admin');
        Route::put('user/{id}', 'UserController@update')->name('user.update')->middleware('can:is_admin');
        //Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy')->middleware('can:is_admin');

        Route::get('quesito', 'QuesitoController@index')->name('quesito.index')->middleware('can:is_admin');
        Route::get('quesito/create', 'QuesitoController@create')->name('quesito.create')->middleware('can:is_admin');
        Route::post('quesito/create', 'QuesitoController@store')->name('quesito.store')->middleware('can:is_admin');
        Route::get('quesito/{id}', 'QuesitoController@show')->name('quesito.show')->middleware('can:is_admin');
        Route::get('quesito/{id}/edit', 'QuesitoController@edit')->name('quesito.edit')->middleware('can:is_admin');
        Route::put('quesito/{id}', 'QuesitoController@update')->name('quesito.update')->middleware('can:is_admin');
        Route::delete('quesito/{id}', 'QuesitoController@destroy')->name('quesito.destroy')->middleware('can:is_admin');

        Route::get('curso', 'CursoController@index')->name('curso.index')->middleware('can:is_admin');
        Route::get('curso/create', 'CursoController@create')->name('curso.create')->middleware('can:is_admin');
        Route::post('curso/create', 'CursoController@store')->name('curso.store')->middleware('can:is_admin');
        Route::get('curso/{id}', 'CursoController@show')->name('curso.show')->middleware('can:is_admin');
        Route::get('curso/{id}/edit', 'CursoController@edit')->name('curso.edit')->middleware('can:is_admin');
        Route::put('curso/{id}', 'CursoController@update')->name('curso.update')->middleware('can:is_admin');
        Route::delete('curso/{id}', 'CursoController@destroy')->name('curso.destroy')->middleware('can:is_admin');

        //Route::get('feedback', 'FeedbackController@index')->name('feedback.index')->middleware('can:is_admin');
        //Route::get('feedback/{id}', 'FeedbackController@show')->name('feedback.show')->middleware('can:is_admin');

        //feedback - inicio
        Route::get('feedback', 'FeedbackController@index')->name('feedback.index')->middleware('can:is_admin');
        Route::get('feedback/{id}', 'FeedbackController@show')->name('feedback.show')->middleware('can:is_admin');
        Route::get('feedbackchart', 'FeedbackController@chart')->name('feedback.chart')->middleware('can:is_admin');
        //feedback - fim

    });
    //admin - fim

    //todos - inicio
    Route::get('self_edit_password', 'UserController@self_edit_password')->name('self_edit_password');
    Route::put('self_update_password', 'UserController@self_update_password')->name('self_update_password');
    //todos - fim


});

