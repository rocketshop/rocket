@foreach ($products as $product)
    <span>{{ $product->sku }}</span>
    <h4>{{ $product->name }} #{{ $product->product_id }}</h4>
    <p>{{ $product->description }}</p>
@endforeach