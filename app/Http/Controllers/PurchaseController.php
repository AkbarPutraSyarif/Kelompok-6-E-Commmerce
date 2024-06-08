<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchase(Product $product)
    {
        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'Product is out of stock.');
        }

        // Logika untuk memproses pembelian
        // Misalnya: mengurangi stok, menambahkan entri pembelian, dsb.

        $product->decrement('stock');

        return redirect()->route('products.index')->with('success', 'Product purchased successfully.');
    }
}
