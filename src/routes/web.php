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

Route::middleware('web')->get('/', function () {
    $request = Request::create('/api/products', 'GET');
    $response = Route::dispatch($request);

    return view('rocket::home', ['products' => $response->getOriginalContent()]);
});

Route::middleware('web')->get('/product/{id}', function ($id) {
    $request = Request::create('/api/product/'.$id, 'GET');
    $response = Route::dispatch($request);

    return view('rocket::product', ['product' => $response->getOriginalContent()]);
});
