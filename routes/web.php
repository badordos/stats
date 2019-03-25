<?php

Auth::routes();

Route::group(['middleware'=> 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/stats/{date?}', 'HomeController@stats')->name('stats');
    Route::get('/all/{year?}', 'HomeController@all')->name('all');

    Route::group(['prefix' => 'category'], function (){
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/show/{category}/{date}', 'CategoryController@show')->name('category.show');
    });

    Route::group(['prefix' => 'purchase'], function (){
        Route::get('/create', 'PurchaseController@create')->name('purchase.create');
        Route::post('/store', 'PurchaseController@store')->name('purchase.store');
        Route::get('/edit/{purchase}', 'PurchaseController@edit')->name('purchase.edit');
        Route::post('/update', 'PurchaseController@update')->name('purchase.update');
        Route::get('/delete/{purchase}', 'PurchaseController@delete')->name('purchase.delete');
    });
});

