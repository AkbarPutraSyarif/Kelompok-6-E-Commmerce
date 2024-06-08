@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>Price: {{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Stock: {{ $product->stock }}</p>
    @if ($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
    @endif
    @if ($product->stock > 0)
    <form action="{{ route('products.purchase', $product) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-success">Purchase</button>
    </form>
    @else
    <button class="btn btn-secondary" disabled>Out of Stock</button>
    @endif
</div>
@endsection
