<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\User\Http\Controllers'], function () {

    Route::resource('key', 'KeyController');
    Route::get('/key-datatable', 'KeyController@datatable')->name('key.datatable');

    Route::get('/apis', 'KeyController@apis')->name('key.apis');
    Route::post('/apis-update', 'KeyController@apisUpdate')->name('key.apis-update');

});
