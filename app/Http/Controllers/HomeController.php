<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // $products = Product::with('category')->get();

    public function index()
    {
        // $data = [
        //     'title' => 'Dashboard',
        //     'product' => Product::all()->count()
        // ];

        // return view('home', $data);
        
        // Contoh data produk, bisa digantikan dengan data dari database
        $products = [
            ['name' => 'Indomie', 'harga' => 3000, 'image' => 'Barang1.jpg'],
            ['name' => 'Teh Pucuk', 'harga' => 3500, 'image' => 'Barang2.jpg'],
            ['name' => 'Oreo', 'harga' => 7500, 'image' => 'Barang3.jpg'],
            
        ];

        return view('home', compact('products'));
    
    }
}
