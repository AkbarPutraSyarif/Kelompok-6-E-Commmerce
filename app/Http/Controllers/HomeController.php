<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 80a0e84 (Membuat Beranda dan Database Product)
use App\Models\Product;
use Illuminate\Http\Request;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
=======
use Illuminate\Http\Request;
>>>>>>> e616fbe (Mencoba membuat beranda)
=======
use App\Models\Product;
>>>>>>> a0dfb3a (testing beranda)
=======
use Illuminate\Http\Request;
>>>>>>> 55fe1ff (Membuat Direct namun belum jadi)
=======
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
>>>>>>> 99bc52f (pembuatan prototipe beranda dari hans ega hizkia beserta fitur dan db buatan)

class HomeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $products = Product::all();

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
}
=======
        // Contoh data produk, bisa digantikan dengan data dari database
        $products = [
            ['name' => 'Indomie', 'harga' => 3000, 'image' => 'Barang1.jpg'],
            ['name' => 'Teh Pucuk', 'harga' => 3500, 'image' => 'Barang2.jpg'],
            ['name' => 'Oreo', 'harga' => 7500, 'image' => 'Barang3.jpg'],
            
=======
        $data = [
            'title' => 'Dashboard',
            'product' => Product::all()->count()
>>>>>>> a0dfb3a (testing beranda)
=======
        // Contoh data produk, bisa digantikan dengan data dari database
        $products = [
            ['id' => 1, 'name' => 'Indomie', 'harga' => 3000, 'image' => 'Barang1.jpg'],
            ['id' => 2, 'name' => 'Teh Pucuk', 'harga' => 3500, 'image' => 'TehPucukHD.jpg'],
            ['id' => 3, 'name' => 'Oreo', 'harga' => 7500, 'image' => 'Barang3.jpg'],
>>>>>>> 55fe1ff (Membuat Direct namun belum jadi)
        ];
        
=======
        // Mengambil semua produk dari database
=======
>>>>>>> 5f9760f (Nambahin checkout product dan layout product)
        $products = Product::all();
>>>>>>> 80a0e84 (Membuat Beranda dan Database Product)

        return view('home', compact('products'));
    }

    public function purchase($id)
    {
        $product = Product::findOrFail($id);

        return view('purchase', compact('product'));
    }
<<<<<<< HEAD
}
>>>>>>> e616fbe (Mencoba membuat beranda)
=======

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
}
>>>>>>> 5f9760f (Nambahin checkout product dan layout product)
