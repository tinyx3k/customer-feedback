<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\Transaction\Http\Controllers'], function () {

    Route::resource('transaction', 'TransactionController');

});
