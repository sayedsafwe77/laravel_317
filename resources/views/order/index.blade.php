@extends('adminlte::page')
@section('content')
    <a href="{{ route('order.create') }}" class="btn btn-primary">create</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>total</th>
                <th>user name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        {{-- <x-delete-button action="{{ route('order.destroy', $order->id) }}" :model="$order" /> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $orders->links() }} --}}
@endsection
