<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Cookie;
=======
>>>>>>> 5f9760f (Nambahin checkout product dan layout product)
=======
use Illuminate\Support\Facades\Cookie;
>>>>>>> 99bc52f (pembuatan prototipe beranda dari hans ega hizkia beserta fitur dan db buatan)

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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 99bc52f (pembuatan prototipe beranda dari hans ega hizkia beserta fitur dan db buatan)
        $user = Register::where('Email', $request->input('email'))->firstOrFail();
        $totalPrice = $product->harga * $quantity;

        if ($product->stock < $quantity) {
            return redirect()->route('purchase', $product->id)->withErrors(['quantity' => 'Not enough stock available'])->withInput();
        }

        if ($user->saldo < $totalPrice) {
            return redirect()->route('checkout.index')->withErrors(['saldo' => 'Not enough balance'])->withInput();
        }

        // Deduct the quantity from the product's stock
        $product->stock -= $quantity;
        $product->save();

        // Deduct the total price from the user's balance
        $user->saldo -= $totalPrice;
        $user->save();

        // return redirect()->route('home')->with(['success_message', 'Purchase successful!')'user_balance' => $user->saldo;
        return redirect()->route('home')->with([
            'success_message' => 'Purchase successful!',
            'user_balance' => $user->saldo
        ]);
<<<<<<< HEAD

=======
>>>>>>> 99bc52f (pembuatan prototipe beranda dari hans ega hizkia beserta fitur dan db buatan)
    }
}