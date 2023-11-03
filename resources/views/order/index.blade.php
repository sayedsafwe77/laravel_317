@extends('adminlte::page')

@section('content')
    @auth('admin')
        <a href="{{ route('order.create') }}" class="btn btn-primary">create</a>
    @endauth
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>total</th>
                <th>user id</th>
                <th>user name</th>
            </tr>
        </thead>
        {{-- Gates --}}
        <tbody>
            @foreach ($orders as $order)
                @can('show-orders', $order)
                    <tr>
                        <td>{{ substr($order->id, strrpos($order->id, '-') + 1) }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            {{-- <x-delete-button action="{{ route('order.destroy', $order->id) }}" :model="$order" /> --}}
                        </td>
                    </tr>
                @endcan
            @endforeach
        </tbody>
    </table>
    {{-- {{ $orders->links() }} --}}
@endsection
