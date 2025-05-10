<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index()
    {
       $projects = Produk::all();
       return view('page.works', compact('projects'));
    }

    public function create(Request $request)
    {
        
    }
}
