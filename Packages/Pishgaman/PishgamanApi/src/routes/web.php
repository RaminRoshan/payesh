<?php
Route::group(['namespace' => 'Pishgaman\PishgamanApi\Controllers\Web', 'middleware' => ['web']], function(){
    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('web/service', 'Admin\WebServicesController@action')->name('WebService');
    });
});



