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

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin', function(){
        return view('admin.index');
    });
});
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/users', "AdminUsersController");
Route::get('/admin','HomeController@index');
//Route::get('barcode', 'HomeController@barcode');
Route::resource('admin/addresses', "AdminAddressesController");
Route::resource('admin/countries', "AdminCountriesController");
Route::resource('admin/cities', "AdminCitiesController");
Route::resource('admin/authors', "AdminAuthorsController");
Route::resource('admin/books', "AdminBooksController");
Route::resource('admin/barcodes', "AdminBarcodesController");
Route::resource('admin/rents', "AdminRentsController");
Route::resource('admin/inventories', "AdminInventoriesController");





Route::get('user/role/create', function(){
    $user = User::findOrFail(1);
    $role = new Role(['name'=>'Administrator']);
    $user->roles()->save($role);
});

Route::get('role/update', function(){
    $user = User::findOrFail(2);
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name == 'Administrator'){
                $role->name = 'Client';
                $role->save();
            }

        }
    }
});
Route::get('/multipleroles', function(){
    $user = User::findOrFail(2);
    $user->roles()->sync([1,2]);
});


