<?php
Route::group(['namespace' => 'Pishgaman\BackUpDB\Http\Controllers', 'middleware' => ['web']], function(){
    Route::prefix('admin/setting')->middleware('auth')->group(function () {
        Route::match(['get','post'],'backup', 'BackUpController@action')->name('BackUpAction');
    });
});
// Route::group(['namespace' => 'Pishgaman\BackUpDB\Http\Controllers', 'middleware' => ['web']], function(){
//     Route::match(['get','post'],'justBackup', 'BackUpController@justBackup');
// });
