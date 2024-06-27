<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required',
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('checkout.index')
                ->withErrors($validator)
                ->withInput();
        }
        
        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');
        $user = Register::where('Email', $request->input('email'))->firstOrFail();
        $totalPrice = $product->harga * $quantity;

        if ($user->Email !== $request->input('email') || !Hash::check($request->input('password'), $user->password)) {
            return redirect()->route('checkout.index')
                ->withErrors(['email' => 'Email atau password tidak sesuai'])
                ->withInput();
        }

        if ($product->stock < $quantity) {
            return redirect()->route('checkout.index')->withErrors(['quantity' => 'Stok tidak mencukupi'])->withInput();
        }

        if ($user->saldo < $totalPrice) {
            return redirect()->route('checkout.index')->withErrors(['saldo' => 'Saldo tidak mencukupi'])->withInput();
        }

        $product->stock -= $quantity;
        $product->save();

        $user->saldo -= $totalPrice;
        $user->save();

        return redirect()->route('home')->with([
            'success_message' => 'Pembelian berhasil!',
            'user_balance' => $user->saldo
        ]);
    }
}
