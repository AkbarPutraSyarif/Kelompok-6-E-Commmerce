<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua produk dari database
        $products = Product::all();

        return view('home', compact('products'));
    }

    public function purchase($id)
    {
        // Mengambil detail produk berdasarkan ID
        $product = Product::findOrFail($id);

        return view('purchase', compact('product'));
    }
}
