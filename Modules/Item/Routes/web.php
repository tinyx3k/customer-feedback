<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\Item\Http\Controllers'], function () {
    Route::resource('item', 'ItemController');
    Route::get('item-menu', 'ItemController@menu')->name('item.menu');
    Route::get('item-question/{id}', 'ItemController@question')->name('item.question');
    Route::post('expression', 'ItemController@expression')->name('item.expression');
    Route::get('show-expressions/{id}', 'ItemController@showExpression')->name('item.show-expressions');
});
