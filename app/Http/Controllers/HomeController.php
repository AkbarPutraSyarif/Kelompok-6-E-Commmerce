<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Contoh data produk, bisa digantikan dengan data dari database
        $products = [
            ['name' => 'Indomie', 'harga' => 3000, 'image' => 'Barang1.jpg'],
            ['name' => 'Teh Pucuk', 'harga' => 3500, 'image' => 'Barang2.jpg'],
            ['name' => 'Oreo', 'harga' => 7500, 'image' => 'Barang3.jpg'],
            
        ];

        return view('home', compact('products'));
    }
}
