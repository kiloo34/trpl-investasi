<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('beranda');

Route::post('/investor/store', 'InvestorController@store')->name('investor.store');
Route::post('/peternak/store', 'PeternakController@store')->name('peternak.store');


Route::group(['middleware' => ['admindoang']], function () {

    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/peternak', 'AdminController@peternak')->name('admin.peternak');
    Route::get('/investor', 'AdminController@investor')->name('admin.investor');
    Route::get('/pesanan', 'AdminController@pesanan')->name('admin.pesanan');
    Route::get('/produk', 'AdminController@produk')->name('admin.produk');
    Route::get('/bank', 'AdminController@bank')->name('admin.bank');
    Route::get('/peternak/verifikasi/{user}', 'AdminController@verifikasi')->name('peternak.verifikasi');
    Route::get('/produk/delete/{produk}', 'AdminController@destroy')->name('produk.destroy');
    Route::resource('bank', 'BankController');
    Route::post('bank/akun', 'BankController@akun')->name('bank.akun');
});

Route::group(['middleware' => ['harusaktif']], function () {

    Route::get('/investor/profil', 'InvestorController@index')->name('investor.index');
    Route::get('/investor/pantau', 'InvestorController@pantau')->name('produk.pantau');
    Route::get('/investor/produk', 'InvestorController@produk')->name('produk.index');
    Route::put('/investor/{id}/edit', 'InvestorController@update')->name('investor.update');

    Route::resource('order', 'OrderController')->except('create');
    Route::get('/order/list', 'OrderController@index')->name('pesanan.index');
    Route::get('/order/tambah/{id}', 'OrderController@tambah')->name('order.tambah');
    // Route::post('/order/store/{id}', 'OrderController@store')->name('order.store');

    //saldo
    Route::resource('saldo', 'SaldoController')->except('show', 'edit', 'destroy');
    // Route::get('/investor/saldo', 'SaldoController@index')->name('investor.index');

    Route::get('/peternak/profil', 'PeternakController@index')->name('peternak.index');
    Route::put('/peternak/{id}/edit', 'PeternakController@update')->name('peternak.update');
    Route::get('/peternak/produk', 'PeternakController@produk')->name('produk.index');
    Route::post('/peternak/tambah_produk', 'PeternakController@tambah_produk')->name('peternak.tambah_produk');
    Route::put('/peternak/{id}/edit_produk', 'PeternakController@update_produk')->name('peternak.update_produk');

    // diskusi
    // Route::resource('diskusi', 'DiskusiController');
    Route::get('/diskusi/{produk}', 'DiskusiController@index')->name('diskusi.index');
    Route::get('/diskusi/balas_index/{diskusi}', 'DiskusiController@balas_index')->name('diskusi.balas_index');
    Route::post('/diskusi/store/{id}', 'DiskusiController@store')->name('diskusi.store');
    Route::post('/diskusi/balas/{id}', 'DiskusiController@balas')->name('diskusi.balas');

    Route::resource('bank', 'BankController');
    // Route::post('bank/akun', 'BankController@akun')->name('bank.akun');
    Route::post('bank/tarik', 'BankController@tarik')->name('bank.tarik');

});


