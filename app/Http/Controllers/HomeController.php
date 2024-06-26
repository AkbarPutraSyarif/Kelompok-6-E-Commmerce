<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
    public function showTopUpForm()
    {
        return view('topup');
    }

    public function topUpBalance(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:register,Email',
        'password' => 'required',
        'amount' => 'required|integer|min:50000',
    ]);

    if ($validator->fails()) {
        return redirect()->route('topup')
            ->withErrors($validator)
            ->withInput();
    }

    $user = Register::where('Email', $request->input('email'))->first();

    if (!$user || !Hash::check($request->input('password'), $user->password)) {
        return redirect()->route('topup')
            ->withErrors(['email' => 'Email atau password tidak sesuai'])
            ->withInput();
    }


    $user->saldo += $request->input('amount') - 10000;
    $user->save();

    return redirect()->route('home')->with([
        'success_message' => 'Top-up berhasil',
        'user_balance' => $user->saldo
    ]);
}

public function search(Request $request)
{
    $search = $request->input('query');
    $testlower = strtolower($search);
    $products = Product::whereRaw('LOWER(name) LIKE ?', ["%$testlower%"])->paginate(4);
    return view('products', compact('products'));
}
public function sort(Request $request)
{
    $sort = $request->input('sort');

    if ($sort == 'name_asc') {
        $products = Product::orderBy('name', 'asc')->paginate(12);
    } elseif ($sort == 'name_desc') {
        $products = Product::orderBy('name', 'desc')->paginate(12);
    } elseif ($sort == 'price_desc') {
        $products = Product::orderBy('harga', 'desc')->paginate(12);
    } elseif ($sort == 'price_asc') {
        $products = Product::orderBy('harga', 'asc')->paginate(12);
    } else {
        $products = Product::paginate(8);
    }

    return view('products', compact('products'));
}
}