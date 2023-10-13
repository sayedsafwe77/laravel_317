@foreach ($products as $product)
    <p>{{ $product->name }}</p>
    <p>{{ $product->price }}</p>
    <p>{{ $product->quantity }}</p>
@endforeach
