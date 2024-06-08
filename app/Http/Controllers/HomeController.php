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
        $data = [
            'title' => 'Dashboard',
            'product' => Product::all()->count()
        ];

        return view('home', $data);
    }
}
