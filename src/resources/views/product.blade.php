<article class="board__article board__article--product">
    <img src="http://placehold.it/200x200">
    <h3 class="product__name">{{ $product->name }} #{{ $product->product_id }}</h3>
    <div class="product__sku">{{ $product->sku }}</div>
    <p class="product__description">{{ $product->description }}</p>
</article>

<style>

* {
    box-sizing: border-box;
}

body {
    font-family: helvetica;
}

</style>