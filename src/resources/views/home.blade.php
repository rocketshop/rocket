<div class="board">
    @foreach ($products as $product)
    <article class="board__article board__article--product">
        <img src="http://placehold.it/200x200">
        <h3 class="product__name">{{ $product->name }} #{{ $product->product_id }}</h3>
        <div class="product__sku">{{ $product->sku }}</div>
        <p class="product__description">{{ $product->description }}</p>
    </article>
    @endforeach
</div>

<style>

* {
    box-sizing: border-box;
}

body {
    font-family: helvetica;
}

.product__name {
    text-transform: capitalize;
    margin-bottom: 0;
}

.product__sku {
    font-size: 10px;
    color: #888;
}

.board {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}

.board__article {
    flex: 0 1 auto;
    padding: 16px;
}

</style>