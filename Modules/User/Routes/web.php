<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\User\Http\Controllers'], function () {

    Route::resource('user', 'UserController');

    Route::resource('role', 'RoleController');

    Route::resource('permission', 'PermissionController');

    Route::resource('role_permission', 'RolePermissionController');

    Route::get('user-profile/{id}', 'UserController@userProfile')->name('user.profile');

    Route::get('profile', 'UserController@getprofile')
        ->name('profile');

    Route::post('/updateInformation', 'UserController@update')
        ->name('updateInformation');

    Route::post('/search-information', 'UserController@searchInformation')
        ->name('search.information');

    Route::get('/', 'UserController@dashboard')
        ->name('dashboard');

    Route::get('change-password', 'UserController@getPassword')
        ->name('change.password');

    Route::post('/change-password', 'UserController@getChangePassword')
        ->name('changePassword');

    Route::get('change-profile-image', 'UserController@profileImage')->name('profile.image');

    Route::post('save-profile-image', 'UserController@changeProfileImage')->name('save.profile.image');

    Route::get('/role-datatable', 'RoleController@datatable')->name('role.datatable');

    Route::get('/permission-datatable', 'PermissionController@datatable')->name('permission.datatable');

    Route::get('/user-datatable', 'UserController@datatable')->name('user.datatable');

    Route::post('/roleRestore', 'RoleController@restore')
        ->name('roleRestore');

    Route::post('/userRestore', 'UserController@restore')
        ->name('userRestore');


    Route::get('/customer-reports', 'ReportController@customerReports')->name('customer.report');
    Route::get('/item-reports', 'ReportController@itemReports')->name('item.report');
    Route::get('/redeem-reports', 'ReportController@redeemReports')->name('redeem.report');

    Route::post('accept-terms', 'UserController@acceptTerms')->name('accept.terms');
});

Route::group(['middleware' => [], 'namespace' => 'Modules\User\Http\Controllers'], function () {

});

Route::group(['middleware' => [], 'namespace' => 'Modules\User\Http\Controllers'], function () {

    Route::get('/verification/{token}', 'UserController@verifyEmail');
});

Route::group(['middleware' => ['web'], 'namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::get('details/{token}', 'RegisterController@profileDetails')->name('profile.details');

    Route::post('registerDetails/{token}', 'RegisterController@registerDetails')->name('register.details');
});
