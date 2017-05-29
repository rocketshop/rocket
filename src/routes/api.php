<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ?filter[id]=1,2,3,4
function filters($filters) {
//    foreach ($filters as $key => $filter) {
//        $filter = explode(',', $filter);
//        $filters[$key] = (object) $filter;
//    }

    return (object) $filters;
}

Route::middleware('api')->get('/api/products', function (Request $request) {
    $filters = filters($request->filter);

    $products = new Rocket\Fuel\Article\ArrayArticleRepository();

    for($i = 1; $i < 11 ; $i++) {
        $product = new Rocket\Fuel\Article\Article();

        $product->fill([
            'id'            => $i,
            'product_id'    => $i,
            'sku'           => '10-' . dechex($i*13922),
            'name'          => 'product',
            'description'   => 'lorem ipsum dolor sit amet.'
        ]);

        $products->add($product);
    }
    
    return $products->getAll();
});

Route::middleware('api')->get('/api/product/{id}', function (int $id) {
    $products = new Rocket\Fuel\Article\ArrayArticleRepository();
    
    $product = new Rocket\Fuel\Article\Article();
    $product->fill([
        'id'            => $id,
        'product_id'    => $id,
        'sku'           => '10-' . dechex($id*13922),
        'name'          => 'product',
        'description'   => 'lorem ipsum dolor sit amet.'
    ]);
    $products->add($product);

    return $products->findById($id);
});

Route::middleware('api')->get('/api/cart/{id}', function ($id) {
    $products = new Rocket\Fuel\Article\ArrayArticleRepository();

    for($i = 1; $i < 4; $i++) {
        $product = new Rocket\Fuel\Article\Article();

        $product->fill([
            'id'            => $i,
            'product_id'    => $i,
            'sku'           => '10-' . dechex($i*13922),
            'name'          => 'product',
            'description'   => 'lorem ipsum dolor sit amet.'
        ]);

        $products->add($product);
    }

    $response = [
        'id'       => $id,
        'qty'      => 4,
        'articles' => $products->getAll()
    ];

    return $response;
});

Route::middleware('api')->get('/api/users', function () {
    $users = new Rocket\Fuel\User\EloquentUserRepository();

    return $users->getAll();
});



Route::middleware('api')->get('/api/user/{id}', function ($id) {
    $users = new Rocket\Fuel\User\EloquentUserRepository();

    return $users->findById($id);
});
