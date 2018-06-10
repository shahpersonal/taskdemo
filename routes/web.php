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


Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/contactus', function () {
    return view('contactus');
});
Route::post('/contactus', 'ContactsController@create');
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin', 'AdminController@login');
Route::post('/register', 'AdminController@register');
//Route::get('/admin/role',[
// 'as'=>'admin.role.index',
// 'uses'=> function()
// {
//  return view('admin.role.index');
// }
//]);

Route::group(['middleware' => ['auth', 'role:admin']], function() {

    Route::resource('role', 'RoleController');

});

//Route::resource('role',[
//    'as' =>'RoleController',
//    'middleware'=>'role:admin',
//     'uses'=>   function() {
//    return view('RoleController');
//}
//]);

Route::group(['middleware'=>['auth']],function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@chkPassword');
    Route::match(['get','post'],'/admin/profile', 'AdminController@updateProfile');
    Route::match(['get','post'],'/admin/update-pwd', 'AdminController@updatePassword');
    // country route admin
    Route::match(['get','post'],'/admin/add_country', 'CountryController@addCountry')->name('add_country');
    Route::match(['get','post'],'/admin/edit_country/{id}', 'CountryController@editCountry');
    Route::match(['get','post'],'/admin/delete_country/{id}', 'CountryController@deleteCountry');
    Route::get('/admin/view_country', 'CountryController@viewCountry');
    // city route admin
    Route::match(['get','post'],'/admin/add_city', 'CitiesController@addCity')->name('add_city');
    Route::match(['get','post'],'/admin/edit_city/{id}', 'CitiesController@editCity');
    Route::match(['get','post'],'/admin/delete_city/{id}', 'CitiesController@deleteCity');
    Route::get('/admin/view_city', 'CitiesController@viewCity');
    // city route admin
    Route::match(['get','post'],'/admin/add_area', 'AreasController@addArea');
    Route::get('/admin/get_city', 'AreasController@getCity');
    Route::match(['get','post'],'/admin/edit_area/{id}', 'AreasController@editArea');
    Route::match(['get','post'],'/admin/delete_area/{id}', 'AreasController@deleteArea');
    Route::get('/admin/view_area', 'AreasController@viewArea');
    //---- Category
    Route::match(['get','post'],'/admin/add_category', 'CategoriesController@addCategory');
    Route::match(['get','post'],'/admin/edit_category/{id}', 'CategoriesController@editCategory');
    Route::match(['get','post'],'/admin/delete_category/{id}', 'CategoriesController@deleteCategory');
    Route::get('/admin/view_category', 'CategoriesController@viewCategory');

    //---- Customer
    Route::match(['get','post'],'/admin/add_customer', 'HomeController@addUser')->name('add_customer');
    Route::match(['get','post'],'/admin/edit_customer/{id}', 'HomeController@editUser')->name('edit_customer');
    Route::match(['get','post'],'/admin/edit_role/{id}', 'HomeController@editUserRole');
    Route::match(['get','post'],'/admin/delete_customer/{id}', 'CustomersController@deleteCustomer');
   // Route::get('/admin/view_customer', 'HomeController@viewCustomer');


});

