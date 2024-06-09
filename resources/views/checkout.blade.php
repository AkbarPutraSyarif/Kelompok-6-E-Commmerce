@extends('layout')

@section('title', 'Checkout')

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

        <h1 class="checkout-heading stylish-heading">Checkout</h1>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ old('product_id') }}">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Confirm Purchase</button>
        </form>
    </div>
@endsection
