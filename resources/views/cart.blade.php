@extends('layout')

@section('title', 'Cart')

@section('content')
<div class="container mt-5">
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="display-4">Your Cart</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->product->name }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>Rp {{ number_format($cartItem->product->harga * $cartItem->quantity, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </form>
</div>
@endsection