<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        // Contoh data produk, bisa digantikan dengan data dari database
        $products = [
            ['id' => 1, 'name' => 'Indomie', 'harga' => 3000, 'image' => 'Barang1.jpg'],
            ['id' => 2, 'name' => 'Teh Pucuk', 'harga' => 3500, 'image' => 'TehPucukHD.jpg'],
            ['id' => 3, 'name' => 'Oreo', 'harga' => 7500, 'image' => 'Barang3.jpg'],

        ];
        

        return view('home', compact('products'));

    }
    public function purchase($id)
    {
        // Dapatkan detail produk berdasarkan ID
        $products = [
            ['id' => 1,'name' => 'Indomie', 'harga' => 3000, 'image' => 'Barang1.jpg'],
            ['id' => 2,'name' => 'Teh Pucuk', 'harga' => 3500, 'image' => 'TehPucukHD.jpg'],
            ['id' => 3,'name' => 'Oreo', 'harga' => 7500, 'image' => 'Barang3.jpg'],
        ];
    
        if (!array_key_exists($id, $products)) {
            abort(404);
        }
    
        $product = $products[$id];
    
        return view('purchase', compact('product'));
    }
    
}
