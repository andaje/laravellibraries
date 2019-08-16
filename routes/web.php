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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;




Route::get('/', 'FrontendController@index');
Route::patch('rents/{id}', 'FrontendController@update');
Route::patch('/{id}', 'FrontendController@returnBook');

Route::get('/rentals', [ 'uses'=>'FrontendController@myRentals'])->middleware('auth');
Route::get('/rentals/history', [ 'uses'=>'FrontendController@history'])->middleware('auth');
Auth::routes();
Route::get('/admin', 'HomeController@index')->middleware('admin');

Route::group(['middleware'=>'admin'],function(){
    Route::prefix('admin')->group(function () {

        Route::resource('users', "AdminUsersController");
        Route::resource('addresses', "AdminAddressesController");
        Route::resource('authors', "AdminAuthorsController");
        Route::resource('books', "AdminBooksController");
        Route::resource('barcodes', "AdminBarcodesController");
        Route::resource('rents', "AdminRentsController");

    });
});


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


