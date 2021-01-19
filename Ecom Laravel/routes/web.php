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

Route::get('/', function () {
    return view('home');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/forgetpass', function () {
    return view('forgetpass');
});

Route::get('/recoverpass', function () {
    return view('recoverpass');
});

//Admin side
Route::resource('category','categorycontroller');
Route::resource('product','productcontroller');

//*User side
Route::get('index', 'usersidecontroller@index');
Route::get('productlist', 'usersidecontroller@productlist');
Route::get('viewproduct/{id}', 'usersidecontroller@viewproduct');
Route::post('cartprocess/{id}','usersidecontroller@cartprocess');
Route::get('checkout', 'usersidecontroller@checkout');
Route::get('removecart/{id}','usersidecontroller@removecart');

Route::post('updatecart/{id}','usersidecontroller@updatecart');

Route::post('placeorder', 'usersidecontroller@placeorder');

Route::get('/thankyou', function()
{
    echo 'Order Placed Successfully';
});

Route::get('about', 'usersidecontroller@about');
Route::get('contact1', 'usersidecontroller@contact1');

