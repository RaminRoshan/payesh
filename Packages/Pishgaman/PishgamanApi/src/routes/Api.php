<?php

Route::group(['namespace' => 'Pishgaman\PishgamanApi\Controllers\Api', 'middleware' => ['auth:sanctum']], function(){
    Route::prefix('api/admin')->group(function () {
        Route::match(['get','post','put','delete'],'webservice', 'Admin\WebServiceController@action')->name('PishgamanRequestApiAction');
    });
});

