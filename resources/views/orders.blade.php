@foreach ($orders as $order)
    <p>{{ $order->id }}</p>
    <p>{{ $order->total }}</p>
@endforeach
