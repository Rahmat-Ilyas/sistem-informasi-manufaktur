<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Supplier
Route::group(['prefix' => 'supplier'], function() {
	Route::get('/datasupplier', 'PembelianController@datasupplier');
	Route::get('/tambahsupplier', 'PembelianController@tambahsupplier');
	Route::get('/tambahsupplier/dta', 'PembelianController@tambahsupplierdta');
	Route::post('/storesupplier', 'PembelianController@storesupplier');
	Route::get('/datasupplier/{id}/edit', 'PembelianController@editdatasupplier');
	Route::post('/datasupplier/{id}/update', 'PembelianController@updatedatasupplier');
	Route::delete('/datasupplier/{id}/delete', 'PembelianController@deletedatasupplier');
});

//Pembelian
Route::group(['prefix' => 'pembelian'], function() {
	Route::get('/datapembelian', 'PembelianController@datapembelian');
	Route::get('/tambahdata', 'PembelianController@tambahdata');
	Route::post('/storedata', 'PembelianController@storedata');
	Route::get('/datapembelian/{id}/edit', 'PembelianController@editdata');
	Route::post('/datapembelian/{id}/update', 'PembelianController@updatedata');
	Route::delete('/datapembelian/{id}/delete', 'PembelianController@deletedata');
	Route::get('/laporanpembelian', 'PembelianController@laporanpembelian');
});

//Penjualan
Route::group(['prefix' => 'penjualan'], function() {
	Route::get('/datapenjualan', 'PenjualanController@datapenjualan');
	Route::get('/tambahpenjualan', 'PenjualanController@tambahpenjualan');
	Route::post('/storepenjualan', 'PenjualanController@storepenjualan');
	Route::get('/datapenjualan/{id}/edit', 'PenjualanController@editdatapenjualan');
	Route::post('/datapenjualan/{id}/update', 'PenjualanController@updatedatapenjualan');
	Route::delete('/datapenjualan/{id}/delete', 'PenjualanController@deletedatapenjualan');
	Route::get('/laporanpenjualan', 'PenjualanController@laporanpenjualan');
	Route::get('/datapengiriman', 'PenjualanController@datapengiriman');
	Route::post('/datapengiriman/{id}/update', 'PenjualanController@updatekirim');
});

//Persediaan
Route::group(['prefix' => 'persediaan'], function() {
	Route::get('/persediaanbahan', 'PersediaanController@persediaanbahan');
	Route::post('/persediaanbahan/{id}/updatestok', 'PersediaanController@updatestok');
	Route::get('/persediaanbarang', 'PersediaanController@persediaanbarang');
});