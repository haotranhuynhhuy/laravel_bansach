<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('login','adminLoginController@getLogin');
Route::post('login','adminLoginController@postLogin');
Route::get('logout','adminLoginController@getLogout');
Route::group(['prefix'=>'admin','middleware' => 'adminaccessLogin'],function()
{
    Route::Get('dashboard','DashController@getDash');
    Route::get('change/{id}','adminLoginController@getChangePass');
    Route::post('change/{id}','adminLoginController@postChangePass');
    Route::get('setting/{id}','adminLoginController@getSetting');
    Route::group(['prefix'=>'sach'],function()
    {
        Route::get('list','SachController@getList');
        Route::get('add','SachController@getAdd');
        Route::post('add','SachController@postAdd');
        Route::get('edit/{id}','SachController@getEdit');
        Route::post('edit/{id}','SachController@postEdit');
        Route::get('delete/{id}','SachController@getDelete');
    });

    Route::group(['prefix'=>'loaisach'],function()
    {
        Route::get('list','LoaiSachController@getList');
        Route::get('add','LoaiSachController@getAdd');
        Route::post('add','LoaiSachController@postAdd');
        Route::get('delete/{id}','LoaiSachController@getDelete');
    });

    Route::group(['prefix'=>'bill'],function()
    {
        Route::get('list','BillController@getList');
        Route::post('list/{id}','BillController@getUpdate');
        Route::get('edit/{id}','BillController@getEdit');
        Route::post('edit/{id}','BillController@postEdit');
        Route::get('detail/{id}','BillController@getDetail');
        Route::get('delete/{id}','BillController@getDelete');
    });

    Route::group(['prefix'=>'customer'],function()
    {
        Route::get('list','CustomerController@getList');
        Route::get('delete/{id}','BillController@getDelete');
    });
});

Route::get('dangnhap','PageController@getLogin');
Route::post('dangnhap','PageController@postLogin');
Route::get('/','PageController@getList');
Route::get('chitietsanpham/{id}','PageController@getDetail');
Route::get('loaisach/{id}','PageController@getLoaiSach');
Route::get('giohang','PageController@getCart');
Route::get('themgiohang/{id}','PageController@getAddtoCart');
Route::get('xoagiohang/{id}','PageController@getDeleteItemsCart');
Route::post('dat-hang','PageController@postCheckout');
Route::get('dangky','PageController@getSignup');
Route::post('dangky','PageController@postSignup');
Route::get('dangxuat','PageController@getLogout');
Route::get('doimatkhau','PageController@getChangePass');
Route::post('doimatkhau/{id}','PageController@postChangePass');
Route::get('thongtin/{id}','PageController@getThongTin');
Route::get('timkiem','PageController@getSearch');
Route::get('giamgiohang/{id}','PageController@getReduce');