<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function dashboard()
    {
        $products = Product::orderBy('id', 'asc')->get();
        return view('admin.dashboard', compact('products'));
    }

    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'increment' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $kurang = $product->stock += $request->input('increment');

        if ($kurang < 0) {
            return redirect()->route('admin.dashboard')->with('error', 'Stock cannot be negative');
        }
        $product->save();

        return redirect()->route('admin.dashboard')->with('success', 'Stock updated successfully');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.dashboard')->with('delete', 'Product deleted successfully');
    }
}