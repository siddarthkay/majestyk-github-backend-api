<?php

use Illuminate\Support\Facades\Route;
use GrahamCampbell\GitHub\Facades\GitHub;

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

Route::get('/',function (){
    return view('welcome');
});

Route::get('/getUser/{username}', function ($username) {
    $response =  Github::search()->users($username);
    dd($response);
    return $response;
});

Route::get('/getRepo/{username}/{repo}', function ($username,$repo) {
    $response =  Github::search()->repositories("user:$username $repo in:name");
    dd($response);
    return $response;
});
