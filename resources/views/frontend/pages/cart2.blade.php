@extends('layouts.app')
@section('content')
    <h1>Shopping Cart</h1>
    @if($cartContent->count())
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartContent as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->qty }}">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->total }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $item->rowId) }}">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total: {{ Cart::total() }}</p>
        <a href="{{ route('cart.clear') }}">Clear Cart</a>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection
