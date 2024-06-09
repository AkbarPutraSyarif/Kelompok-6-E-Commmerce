<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:register,Email',
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:products,id', // Validate product ID exists
        ]);

        if ($validator->fails()) {
            return redirect()->route('checkout.index')
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');

        if ($product->stok < $quantity) {
            return redirect()->route('purchase', $product->id)
                ->withErrors(['quantity' => 'Not enough stock available'])
                ->withInput();
        }

        $product->stok -= $quantity;
        $product->save();

        return redirect()->route('home')->with('success_message', 'Purchase successful!');
    }
}