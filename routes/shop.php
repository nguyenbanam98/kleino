<?php

Route::group([
    'namespace' => 'Shop'
], function () {
    Route::get('dang-nhap', 'AuthController@login')->name('get.login');
    Route::post('dang-nhap', 'AuthController@postLogin')->name('post.login');
    Route::get('dang-ky', 'AuthController@register')->name('get.register');
    Route::post('dang-ky', 'AuthController@create')->name('post.register');

    Route::get('/', 'KleinoController@index')->name('index');
    Route::get('/product/{id}', 'ProductController@productDetail')->name('shop.product')->where('id', '[0-9]+');
    Route::get('/product/add/{id}', 'ProductController@addCart')->name('add.cart')->where('id', '[0-9]+');
});



