<?php

/**
 * Auth
 */
Route::namespace('Auth')->group(function () {
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('/password/reset', 'ResetPasswordController@reset');
});

/**
 * Api
 */
Route::prefix('/api')->group(function () {
    /**
     * Programs
     */
    Route::prefix('/programs')->namespace('Program')->group(function () {
        Route::get('/', 'ProgramController@index')->name('api.programs.index');
        Route::post('/', 'ProgramController@store')->name('api.programs.store');
    });

    /**
     * Questions
     */
    Route::prefix('/questions')->namespace('Question')->group(function () {
        Route::get('/', 'QuestionController@index')->name('api.questions.index');
        Route::post('/', 'QuestionController@store')->name('api.questions.store');
        Route::get('/{question}/edit', 'QuestionController@edit')->name('api.questions.edit');
        Route::patch('/{question}', 'QuestionController@update')->name('api.questions.update');
        Route::delete('/{question}', 'QuestionController@destroy')->name('api.questions.destroy');
    });

    /**
     * Users
     */
    Route::prefix('/users')->namespace('User')->group(function () {
        Route::get('/', 'UserController@index')->name('api.users.index');
        Route::post('/', 'UserController@store')->name('api.users.store');
        Route::get('/{user}/edit', 'UserController@edit')->name('api.users.edit');
        Route::patch('/{user}', 'UserController@update')->name('api.users.update');
        Route::delete('/{user}', 'UserController@destroy')->name('api.users.destroy');
    });
});

/**
 * SPA
 */
Route::get('/{any}', 'SpaController@index')->where('any', '.*');
