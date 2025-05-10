<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produk::paginate(10);
        $categories = Kategori::all();
        return view('admin.produk.produk', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'badge_color' => 'nullable|string|max:50',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produk_images', 'public');
            $validatedData['image'] = '/storage/' . $imagePath;
            $validatedData['image'] = $imagePath;
        }

        Produk::create($validatedData);
        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $product = Produk::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategori,id',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'badge_color' => 'nullable|string|max:50',
    ]);

    // Handle file upload if new image is provided
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        
        $imagePath = $request->file('image')->store('produk_images', 'public');
        $validatedData['image'] = $imagePath;
    }

    $product->update($validatedData);

    return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Produk::findOrFail($id);

        // Delete the image file if it exists
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus.');
    }
}
