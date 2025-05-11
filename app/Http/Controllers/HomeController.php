<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $products = Produk::paginate(10);
        $categories = Kategori::all();
        return view('page.home', compact('products', 'categories'));
    }
}
