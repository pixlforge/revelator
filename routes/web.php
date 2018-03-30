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
     * Answers
     */
    Route::prefix('/answers')->namespace('Answer')->group(function () {
        Route::get('/', 'AnswerController@index')->name('api.answers.index');
        Route::post('/', 'AnswerController@store')->name('api.answers.store');
    });

    /**
     * Diagnostics
     */
    Route::prefix('/diagnostics')->namespace('Diagnostic')->group(function () {
        Route::get('/logout', 'DiagnosticController@logout')->name('api.diagnostics.logout');
        Route::get('/login/{user?}', 'DiagnosticController@login')->name('api.diagnostics.login');
        Route::patch('/{user}', 'DiagnosticController@update')->name('api.diagnostics.update');
        Route::get('/send-me-my-results', 'DiagnosticController@send')->name('api.diagnostics.send');
    });

    /**
     * Options
     */
    Route::prefix('/options')->namespace('Option')->group(function () {
        Route::get('/', 'OptionController@index')->name('api.options.index');
        Route::post('/', 'OptionController@store')->name('api.options.store');
        Route::get('/{option}/edit', 'OptionController@edit')->name('api.options.edit');
        Route::patch('/{option}', 'OptionController@update')->name('api.options.update');
        Route::delete('/{option}', 'OptionController@destroy')->name('api.options.destroy');
    });

    /**
     * Programs
     */
    Route::prefix('/programs')->namespace('Program')->group(function () {
        Route::get('/', 'ProgramController@index')->name('api.programs.index');
        Route::post('/', 'ProgramController@store')->name('api.programs.store');
        Route::get('/{program}/edit', 'ProgramController@edit')->name('api.programs.edit');
        Route::patch('/{program}', 'ProgramController@update')->name('api.programs.update');
        Route::delete('/{program}', 'ProgramController@destroy')->name('api.programs.destroy');
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
