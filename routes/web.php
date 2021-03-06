<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*Utilizatori*/
Route::get('/admin/utilizatori','Admin\UtilizatoriController@utilizatori');
/*Contact Us*/
Route::get('/admin/contact','Admin\ContactUsController@getcontact');
Route::post('/admin/delproblema','Admin\ContactUsController@delproblema');
/*Coments rutes*/
Route::get('/admin/coments','Admin\ComentsController@coments');
Route::post('/admin/deletecoment','Admin\ComentsController@deletecoment');
/*Logo*/
Route::get('/admin/logo','Admin\LogoController@logo');
Route::post('/admin/uploadlogo','Admin\LogoController@uploadlogo');
/*Comenzi rutes*/
Route::get('/admin/comenzi','Admin\ComenziAdminController@comenziadmin');
Route::get('/admin/allcomenzi','Admin\ComenziAdminController@allcomenziadmin');
Route::post('/admin/movecomanda','Admin\ComenziAdminController@movecomanda');
/*Admin*/
Route::get('/admin','Admin\AdminController@base');
Route::get('/admin/login','Admin\AdminController@getLogin');
Route::post('/admin/login','Admin\RegisterController@login');
Route::post('/admin/register','Admin\RegisterController@register');
Route::get('/exitadmin','Admin\RegisterController@exitadmin');
Route::post('/admin/registerother','Admin\RegisterController@registerother');
Route::get('/admin/confirm/{email}-{token}','Admin\RegisterController@comfirmadmin');
Route::get('/admin/reset','Admin\AdminController@reset');
Route::post('/admin/reset','Admin\RegisterController@sendemail');
Route::post('/admin/setcode','Admin\RegisterController@setcode');
Route::post('/admin/newpass','Admin\RegisterController@newpass');

Route::get('/admin/profil','Admin\SettingController@profil');
Route::post('/admin/changename','Admin\SettingController@changename');
Route::post('/admin/profil','Admin\SettingController@changepassword');

/*Admins*/
Route::get('/admin/admins','Admin\AdminController@admins');
Route::post('/admin/deleteadmin','Admin\AdminController@deleteadmin');
/*Products routes*/
Route::get('/admin/products','Admin\AdminController@products');
Route::get('/admin/products/{id}','Admin\ProductsController@getProducts');
Route::post('/admin/getoneadd','Admin\ProductsController@getoneadd');
Route::post('/admin/getoneitem','Admin\ProductsController@getoneitem');
    /*Iteme*/
Route::post('/admin/addItem','Admin\ProductsController@addItem');
Route::post('/admin/modificaItem','Admin\ProductsController@modificaItem');
Route::post('/admin/deleteItem','Admin\ProductsController@deleteItem');
Route::post("/admin/upload","Admin\ProductsController@upload");
Route::post('/admin/deleteImage','Admin\ProductsController@deleteImage');
Route::post('/admin/deleteAllImages','Admin\ProductsController@deleteAllImages');
Route::post('/admin/defaultImage','Admin\ProductsController@defaultImage');
/*Iteme descriere*/
Route::get('/admin/descriere/{id}','Admin\ProductsController@descriere');
Route::post('/admin/uploaddescriere','Admin\ProductsController@uploaddescriere');
Route::post('/admin/deldescriere','Admin\ProductsController@deldescriere');

/*Tabele routes*/
Route::get('/admin/tables','Admin\AdminController@tables');
Route::post('/admin/getTabele','Admin\TablesController@getTabele');

Route::post('/admin/saveTable','Admin\TablesController@saveTable');
Route::post('/admin/addGroup','Admin\TablesController@addGroup');
Route::post('/admin/modificaColoana','Admin\TablesController@modificaColoana');
Route::post('/admin/deleteColoana','Admin\TablesController@deleteColoana');

/*Menu rutes*/
Route::get('/admin/menu','Admin\AdminController@menu');
Route::post('/admin/getOnemenu','Admin\MenuController@getOnemenu');
Route::post('/admin/getOnesubmenu','Admin\MenuController@getOnesubmenu');
Route::post('/admin/getOneitemssubmenu','Admin\MenuController@getOneitemssubmenu');

Route::post('/admin/addMenu','Admin\MenuController@addMenu');
Route::post('/admin/addSubmenu','Admin\MenuController@addSubmenu');
Route::post('/admin/addItemssubmenu','Admin\MenuController@addItemssubmenu');
Route::post('/admin/modMenu','Admin\MenuController@modMenu');
Route::post('/admin/modSubmenu','Admin\MenuController@modSubmenu');
Route::post('/admin/modItemssubmenu','Admin\MenuController@modItemssubmenu');
Route::post('/admin/deletemenu','Admin\MenuController@deletemenu');
Route::post('/admin/deletesubmenu','Admin\MenuController@deletesubmenu');
Route::post('/admin/deleteitem','Admin\MenuController@deleteitem');

/*Slideshow rutes*/
Route::get('/admin/slideshow','Admin\AdminController@slideshow');
Route::post('/admin/addslideshow','Admin\SlideshowController@addslideshow');
Route::post('/admin/delslideshow','Admin\SlideshowController@delslideshow');








/*Generale -----------------------------*/
Route::post('/test-vue-js','Controller@testVueJs');
Route::get('/','HomeController@home');
Route::get('/menu/{id}','HomeController@menu');
Route::get('/submenu/{id}','HomeController@submenu');
Route::get('/sort={sort}/[{id_submenu}]-{numeitem}/page={pag}','HomeController@produse');
Route::get('/product/{id_item}','HomeController@oneprodus');
Route::post('/preview','HomeController@oneproduspreview');
Route::post('/addcomentariu','HomeController@addcomentariu');
/*Profil user*/
Route::get('/profil','ProfilController@profil');
Route::post('/changenameuser','ProfilController@changenameuser');
Route::post('/profil','ProfilController@changepassworduser');
Route::post('/stergecomanda','ProfilController@stergecomanda');
/*Favorite*/
Route::get('/favorite','FavoriteController@favorite');
Route::post('/addfavorite','FavoriteController@addfavorite');
Route::post('/deletefavorite','FavoriteController@deletefavorite');
/*Cos*/
Route::get('/cart','CartController@cart');
Route::post('/addcart','CartController@addcart');
Route::post('/delcart','CartController@delcart');
Route::post('/updatecart','CartController@updatecart');
Route::post('/deleteallcart','CartController@deleteallcart');
/*Compare*/
Route::get('/compare','CompareController@compare');
Route::post('/addcompare','CompareController@addcompare');
Route::post('/deletecompare','CompareController@deletecompare');
/*User register acount*/
Route::get("/login-{facebook}", 'RegisterController@goToFacebook');
Route::get("/login-back/{facebook}",'RegisterController@goToFacebookBack');
Route::post('/register','RegisterController@register');
Route::post('/login','RegisterController@login');
Route::get('/confirm/{email}-{token}','RegisterController@comfirm');
Route::get('/exit','RegisterController@exituser');
Route::get('/reset','RegisterController@resetuser');
Route::post('/reset','RegisterController@sendemailuser');
Route::post('/setcode','RegisterController@setcodeuser');
Route::post('/newpass','RegisterController@newpassuser');
/*Cautare*/
Route::get('/search','SearchController@search');
Route::post('/searchajax','SearchController@searchajax');
/*Comanda*/
Route::get('/comanda','ComandaController@comanda');
Route::post('/endcomanda','ComandaController@endcomanda');
Route::get('/comandatrimisa','ComandaController@comandatrimisa');
/*Menu top top*/
Route::get('/helpbuy','HomeController@helpbuy');
Route::get('/contact','ContactController@contact');
Route::post('/sendproblem','ContactController@sendproblem');