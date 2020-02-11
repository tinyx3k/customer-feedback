<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\Item\Http\Controllers'], function () {
    Route::resource('item', 'ItemController');
    Route::post('expression', 'ItemController@expression')->name('item.expression');
    Route::get('show-expressions/{id}', 'ItemController@showExpression')->name('item.show-expressions');
});
