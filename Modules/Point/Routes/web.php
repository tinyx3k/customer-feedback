<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\Point\Http\Controllers'], function () {
    Route::get('point-index', 'PointController@index')->name('point.index');
    Route::post('bonus-add', 'PointController@bonusAdd')->name('bonus.add');
    Route::post('bonus-customer-search', 'PointController@pointCustomerSearch')->name('point.customer.search');
});
