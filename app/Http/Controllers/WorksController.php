<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorksController extends Controller
{
    public function index()
    {
       $projects = Produk::all();
       $categories = Kategori::all();
       return view('page.works', compact('projects', 'categories'));   
    }

    public function createPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'produk_id' => 'required|exists:produks,id',
            'amount' => 'required|numeric|min:0',
            'email' => 'required|email|max:255',
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^\+?[0-9\s\-]+$/|min:8'
        ], [
            'phone_number.regex' => 'Format nomor telepon tidak valid',
            'exists' => 'Produk tidak ditemukan',
            'min' => 'Nilai minimal :min',
            'numeric' => 'Harus berupa angka',
            'required' => 'Field ini wajib diisi',
            'email' => 'Format email tidak valid'
        ]);
    }
}
