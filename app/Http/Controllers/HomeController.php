<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->get();
        return view('home', compact('products'));
    }

    public function purchase($id)
    {
        $product = Product::findOrFail($id);

        return view('purchase', compact('product'));
    }

    public function confirmPurchase(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:register,Email',
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');

        if ($product->stock < $quantity) {
            return redirect()->route('purchase', $product->id)
                ->withErrors(['quantity' => 'Not enough stock available'])
                ->withInput();
        }

        $product->stock -= $quantity;
        $product->save();

        return redirect()->route('home')->with('success_message', 'Purchase successful!');
    }

    public function showAllProducts()
    {
        $products = Product::paginate(8);
        return view('products', compact('products'));
    }
    //=================================
    public function showTopUpForm()
    {
        return view('topup');
    }

    public function topUpBalance(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:register,Email',
            'amount' => 'required|integer|min:50000',
        ]);

        $user = Register::where('Email', $request->input('email'))->first();
        $user->saldo += $request->input('amount') - 10000;
        $user->save();

        return redirect()->route('home')->with('success_message', 'Top-up anda berhasil')->with('user_balance', $user->saldo);
    }
}