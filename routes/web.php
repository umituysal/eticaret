<?php

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

    //Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/','front\HomeController@index');
Route::get('/urun/{id}','front\HomeController@urun');
Route::get('/urunlerimiz','front\HomeController@urunler');
Route::get('/urunlerim/{adi}','front\HomeController@urunum');
Route::get('/search','front\HomeController@search');
////admin ayar //////////
Route::get('/admin/settings','admin\HomeController@settings');
Route::post('/admin/settingsupdate/{id}','admin\HomeController@settingsupdate');



Route::get('/admin','admin\HomeController@index');

Route::get('/test/{id}','HomeController@test');
//Urunler
Route::get('/admin/urunler','admin\UrunController@index');
Route::get('/admin/urun/edit/{id}','admin\UrunController@edit');
Route::get('/admin/urun/del/{id}','admin\UrunController@destroy');
Route::get('/admin/urun/show/{id}','admin\UrunController@show');
Route::get('/admin/urun/ekle','admin\UrunController@create');
Route::post('/admin/urun/save','admin\UrunController@store');
Route::post('/admin/urun/update/{id}','admin\UrunController@update');
Route::get('/admin/urun/galeri/{id}','admin\UrunController@galeri_formu');
Route::post('/admin/urun/galeri/{id}','admin\UrunController@galeri_ekle');
Route::get('/admin/urun/galerisil/{id}','admin\UrunController@galeri_sil');
//Kategoriler
Route::get('/admin/kategoriler','admin\KategoriController@index');
Route::get('/admin/kategori/edit/{id}','admin\KategoriController@edit');
Route::get('/admin/kategori/del/{id}','admin\KategoriController@destroy');
Route::get('/admin/kategori/show/{id}','admin\KategoriController@show');
Route::get('/admin/kategori/ekle','admin\KategoriController@create');
Route::post('/admin/kategori/save','admin\KategoriController@store');
Route::post('/admin/kategori/update/{id}','admin\KategoriController@update');
//admin kullanıcılar
Route::get('/admin/kullanicilar','admin\KullaniciController@index');
Route::get('/admin/kullanici/edit/{id}','admin\KullaniciController@edit');
Route::get('/admin/kullanici/del/{id}','admin\KullaniciController@destroy');
Route::get('/admin/kullanici/show/{id}','admin\KullaniciController@show');
Route::get('/admin/kullanici/ekle','admin\KullaniciController@create');
Route::post('/admin/kullanici/save','admin\KullaniciController@store');
Route::post('/admin/kullanici/update/{id}','admin\KullaniciController@update');
///admin mesajlar
Route::get('/admin/mesajlar','admin\MesajController@index');
Route::get('/admin/mesajlar/{durum}','admin\MesajController@mesajlar');
Route::get('/admin/mesaj/edit/{id}','admin\MesajController@edit');
Route::get('/admin/mesaj/del/{id}','admin\MesajController@destroy');
Route::post('/admin/mesaj/update/{id}','admin\MesajController@update');

//****************Adminlogin******


Route::get('/admin/login','admin\LoginController@index')->name('admin.login');
Route::post('/admin/login','admin\LoginController@login')->name('admin.login');
Route::get('/admin/logout','admin\LoginController@logout')->name('admin.logout');
Route::get('/admin/register','admin\LoginController@register')->name('admin.register');
Route::post('/admin/register','admin\LoginController@register_save')->name('admin.register');
//Auth::routes();

//anasayfa login
Route::get('/login','front\LoginController@index')->name('front.login');
Route::post('/login','front\LoginController@login')->name('front.login');
Route::get('/logout','front\LoginController@logout')->name('front.logout');
Route::get('/register','front\LoginController@register')->name('front.register');
Route::post('/register','front\LoginController@register_save')->name('front.register');

//alışveriş sepet işlemleri
Route::post('/sepete_ekle','front\UserController@sepete_ekle');
Route::get('/sepetim','front\UserController@sepetim');
Route::get('/siparisler','front\UserController@siparisler');
Route::get('/sepetsil/{id}','front\UserController@sepet_sil');
Route::post('/siparis_tamamla','front\UserController@siparis_tamamla');
Route::post('/satinal','front\UserController@satinal');
Route::get('/siparis_son','front\UserController@siparis_son');
Route::get('/siparis_detay/{id}','front\UserController@siparis_detay');
Route::get('/siparisiptal/{id}','front\UserController@siparis_sil');
//siparis admin
Route::get('/admin/siparisler','admin\SiparisController@index');
Route::get('/admin/siparis_yeni','admin\SiparisController@index');
Route::get('/admin/siparis_detay/{id}','admin\SiparisController@siparis_detay');
Route::get('/admin/siparisler/{durum}','admin\SiparisController@siparisler');
Route::post('/admin/siparis_update/{id}','admin\SiparisController@siparis_update');


//***********user panel**********
Route::get('/user','front\UserController@index')->name('front.user');
Route::get('/profil','front\UserController@profil')->name('front.profil');
Route::post('/profil/{id}','front\UserController@profil_duzenle');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hakkimizda', 'front\HomeController@hakkimizda')->name('front.hakkimizda');
Route::get('/iletisim', 'front\HomeController@iletisim')->name('front.iletisim');


Route::get('/bizeyazin', 'front\HomeController@bize_yazin_formu')->name('front.bize_yazin_formu');
Route::post('/bizeyazin', 'front\HomeController@bize_yazin_kaydet')->name('front.bize_yazin_kaydet');
