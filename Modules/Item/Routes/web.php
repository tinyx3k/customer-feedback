<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\Item\Http\Controllers'], function () {
    Route::resource('item', 'ItemController');
    Route::resource('deal', 'DealController');
    Route::resource('redeem', 'RedeemController');
    Route::resource('bonus', 'BonusController');
    Route::resource('history', 'HistoryController');
    Route::resource('special', 'SpecialsController');
    Route::resource('redemption' ,'RedemptionController');

    Route::get('redeem-deal/{item_id}', 'DealController@redeemItem')->name('deal.redeem');
    Route::get('process-deal/{user_id}/{item_id}', 'DealController@processRedemption')->name('process.deal');
    Route::get('success-redeem/{user_id}/{item_id}', 'DealController@redeemSuccess')->name('redeem.success');
});
