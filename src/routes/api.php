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

Route::middleware('api')->get('/api/products', function (Request $request) {
    $products = new Rocket\Fuel\Article\ArrayArticleRepository();

    for($i = 0; $i < 10; $i++) {
        $product = new Rocket\Fuel\Article\Article();

        $product->fill([
            'id'            => $i,
            'product_id'    => $i,
            'sku'           => dechex(rand()),
            'name'          => 'product',
            'description'   => 'lorem ipsum dolor sit amet.'
        ]);

        $products->add($product);
    }
    
    return $products->getAll();
});

