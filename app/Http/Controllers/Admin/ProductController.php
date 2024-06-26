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
    
    public function buatproduk()
    {
        return view('admin.buatproduk');
    }

    public function buatprodukController(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'harga' => 'required|integer|min:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'stock' => 'required|integer|min:1',
            'expired_date' => 'required|date',
        ]);

        Product::create([
            'name' => $request->input('name'),
            'harga' => $request->input('harga'),
            'image' => $request->file('image')->store('products'),
            'description' => $request->input('description'),
            'stock' => $request->input('stock'),
            'expired_date' => $request->input('expired_date'),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Product added successfully');
    }
}
