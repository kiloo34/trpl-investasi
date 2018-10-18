<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('beranda');

Route::post('/investor/store', 'InvestorController@store')->name('investor.store');
Route::post('/peternak/store', 'PeternakController@store')->name('peternak.store');


Route::group(['middleware' => ['admindoang']], function () {

    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/peternak', 'AdminController@peternak')->name('admin.peternak');
    Route::get('/admin/investor', 'AdminController@investor')->name('admin.investor');
    Route::get('/admin/pesanan', 'AdminController@pesanan')->name('admin.pesanan');
    Route::get('/admin/produk', 'AdminController@produk')->name('admin.produk');
    Route::get('peternak/verifikasi/{peternak}', 'AdminController@verifikasi')->name('peternak.verifikasi');
});

Route::group(['middleware' => ['harusaktif']], function () {

    Route::get('/investor/profil', 'InvestorController@index')->name('investor.index');
    Route::get('/investor/pantau', 'InvestorController@pantau')->name('produk.pantau');
    Route::get('/investor/produk', 'InvestorController@produk')->name('produk.index');
    Route::put('/investor/{id}/edit', 'InvestorController@update')->name('investor.update');
    Route::post('/pesanan/store', 'OrderController@store')->name('pesanan.store');

    Route::get('/peternak/profil', 'PeternakController@index')->name('peternak.index');
    Route::put('/peternak/{id}/edit', 'PeternakController@update')->name('peternak.update');
    Route::get('/peternak/produk', 'PeternakController@produk')->name('produk.index');
    Route::post('/peternak/tambah_produk', 'PeternakController@tambah_produk')->name('peternak.tambah_produk');

    // diskusi
    Route::post('/komentar/{id_produk}', 'DiskusiController@store')->name('diskusi');
});


