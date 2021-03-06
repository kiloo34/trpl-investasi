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
    Route::get('/pesanan/verifikasi/{id}', 'AdminController@verifikasiPembayaran')->name('admin.verifikasiPembayaran');
    Route::get('/pesanan/verifikasiProg/{id}', 'AdminController@verifikasiPembayaranProg')->name('admin.verifikasiPembayaranProg');
    Route::get('/pesanan/batal/{id}', 'AdminController@batalPesanan')->name('admin.batalPesanan');
    Route::get('/pesanan/batalVerif/{id}', 'AdminController@batalVerif')->name('admin.batalVerif');
    Route::get('/pesanan/selesai/{id}', 'AdminController@selesai')->name('admin.selesai');
    Route::get('/pesanan/proses/{id}', 'AdminController@lanjutkan')->name('admin.lanjutkan');
    Route::get('/produk', 'AdminController@produk')->name('admin.produk');
    Route::get('/bank', 'AdminController@bank')->name('admin.bank');
    Route::get('/kontrak', 'AdminController@kontrak')->name('admin.kontrak');
    Route::get('/peternak/verifikasi/{user}', 'AdminController@verifikasi')->name('peternak.verifikasi');
    Route::get('/produk/delete/{produk}', 'AdminController@destroy')->name('produk.destroy');
    Route::resource('bank', 'BankController');
    Route::post('bank/akun', 'BankController@akun')->name('bank.akun');
});

Route::group(['middleware' => ['harusaktif']], function () {

    Route::get('/investor/profil', 'InvestorController@index')->name('investor.index');
    Route::get('/investor/pantau/{id}', 'InvestorController@pantau')->name('produk.pantau');
    Route::get('/investor/produk', 'InvestorController@produk')->name('produk.index');
    Route::put('/investor/{id}/edit', 'InvestorController@update')->name('investor.update');

    Route::resource('order', 'OrderController')->except('create');
    Route::get('/order/detail/{id}', 'OrderController@detail')->name('order.detail');
    Route::get('/order/tambah/{id}', 'OrderController@tambah')->name('order.tambah');
    Route::post('order/bukti/{id}', 'OrderController@pembayaran')->name('bukti.pembayaran');

    //saldo
    Route::resource('saldo', 'SaldoController')->except('show', 'edit', 'destroy');
    // Route::get('/investor/saldo', 'SaldoController@index')->name('investor.index');

    Route::get('/peternak/profil', 'PeternakController@index')->name('peternak.index');
    Route::put('/peternak/{id}/edit', 'PeternakController@update')->name('peternak.update');
    Route::get('/peternak/produk', 'PeternakController@produk')->name('produk.index');
    Route::get('/investor/progres/{id}', 'PeternakController@tProgres')->name('peternak.tProgres');
    Route::post('/peternak/tambah_progres/{id}', 'PeternakController@progres')->name('peternak.progres');
    Route::post('/peternak/tambah_produk', 'PeternakController@tambah_produk')->name('peternak.tambah_produk');
    Route::put('/peternak/{id}/edit_produk', 'PeternakController@update_produk')->name('peternak.update_produk');
    Route::post('tfAdmin/bukti/{id}/{idp}', 'PeternakController@tfAdmin')->name('bukti.tfAdmin');


    // diskusi
    // Route::resource('diskusi', 'DiskusiController');
    Route::get('/diskusi/{produk}', 'DiskusiController@index')->name('diskusi.index');
    Route::get('/diskusi/balas_index/{diskusi}', 'DiskusiController@balas_index')->name('diskusi.balas_index');
    Route::post('/diskusi/store/{id}', 'DiskusiController@store')->name('diskusi.store');
    Route::post('/diskusi/balas/{id}', 'DiskusiController@balas')->name('diskusi.balas');

    Route::resource('bank', 'BankController');
    // Route::post('bank/akun', 'BankController@akun')->name('bank.akun');
    Route::post('bank/tarik', 'BankController@tarik')->name('bank.tarik');

    Route::get('notifikasi', 'HomeController@get_notif')->name('notifikasi');

});


