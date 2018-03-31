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

Route::get('/', function () {

    $viewData['page_title'] = 'Form Customer';
    $viewData['customers'] = \App\Models\Customer::All();
    return view('form-customer.create', $viewData);
});

Route::post('/auth/login', ['uses' => 'LoginController@login', 'as' => 'auth.login']);
Route::get('/auth/logout', ['uses' => 'LoginController@logout', 'as' => 'auth.logout']);

Route::get('hello', function ()    {
    //$userModels = \App\Models\User::all();
    $userModel = \App\Models\User::find('1'); dd($userModel->email);
    $testFilter = filter_var('mario.fredrick@tnisiber.id', FILTER_VALIDATE_EMAIL);
    
    $data = [];
    return view('hello',$data);
})->name('hello');

Route::resource('form-customer', 'CustomerController');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    Route::get('blog', function ()    {
        $testFilter = filter_var('mario.fredrick@tnisiber.id', FILTER_VALIDATE_EMAIL);
        dd($testFilter);
        $data = [];
        return view('blog',$data);
    })->name('blog');

});