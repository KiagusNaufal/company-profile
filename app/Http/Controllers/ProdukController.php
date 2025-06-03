<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $products = Produk::paginate(10);
    $categories = Kategori::all();
    foreach ($products as $product) {
        $product->image_slide = json_decode($product->image_slide);
    }
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
   // ... (bagian atas controller tetap sama)

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategori,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'imagebg_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_slide' => 'sometimes|array',
        'image_slide.*' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        'description' => 'required|string',
        'link_aplikasi' => 'required|string',
        'link_tutorial' => 'required|string',
        'link_sub' => 'required|string',
        'price' => 'required|numeric|min:0',
        'badge_color' => 'nullable|string|max:50',
    ]);

    // Handle file uploads
    $imagePaths = [];
    
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('produk_images', 'public');
        $validatedData['image'] = $imagePath;
    }
    
    if ($request->hasFile('imagebg_produk')) {
        $imagePath = $request->file('imagebg_produk')->store('bg_images', 'public');
        $validatedData['imagebg_produk'] = $imagePath;
    }
    
    if ($request->hasFile('image_logo')) {
        $imagePath = $request->file('image_logo')->store('logo_images', 'public');
        $validatedData['image_logo'] = $imagePath;
    }
    
    // Handle multiple image slides
    if ($request->hasFile('image_slide')) {
        $slidePaths = [];
        foreach ($request->file('image_slide') as $slide) {
            $path = $slide->store('product_slides', 'public');
            $slidePaths[] = $path;
        }
        $validatedData['image_slide'] = json_encode($slidePaths);
    }


    

    Produk::create($validatedData);
    return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $product = Produk::findOrFail($id);

    $validatedData = $request->validate([
        'name' => [
            'required',
            'string',
            'max:255',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&]+$/'
        ],
        'imagebg_produk' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_slide' => 'sometimes|array',
        'image_slide.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'link_aplikasi' => 'sometimes|string',
        'link_tutorial' => 'sometimes|string',
        'link_sub' => 'sometimes|string',
        'kategori_id' => 'required|exists:kategori,id',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => [
            'required',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&\:\;\'\"\!\?\/]+$/'
        ],
        'price' => 'required|numeric|min:0|max:100000000',
    ]);

    // Handle file uploads
    if ($request->hasFile('image')) {
        // Delete old image
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $imagePath = $request->file('image')->store('produk_images', 'public');
        $validatedData['image'] = $imagePath;
    }
    
    if ($request->hasFile('imagebg_produk')) {
        if ($product->imagebg_produk && Storage::disk('public')->exists($product->imagebg_produk)) {
            Storage::disk('public')->delete($product->imagebg_produk);
        }
        $imagePath = $request->file('imagebg_produk')->store('bg_images', 'public');
        $validatedData['imagebg_produk'] = $imagePath;
    }
    
    if ($request->hasFile('image_logo')) {
        if ($product->image_logo && Storage::disk('public')->exists($product->image_logo)) {
            Storage::disk('public')->delete($product->image_logo);
        }
        $imagePath = $request->file('image_logo')->store('logo_images', 'public');
        $validatedData['image_logo'] = $imagePath;
    }
    
    // Handle multiple image slides
    if ($request->hasFile('image_slide')) {
        // Delete old slides
        if ($product->image_slide) {
            $oldSlides = json_decode($product->image_slide, true);
            foreach ($oldSlides as $oldSlide) {
                if (Storage::disk('public')->exists($oldSlide)) {
                    Storage::disk('public')->delete($oldSlide);
                }
            }
        }
        
        $slidePaths = [];
        foreach ($request->file('image_slide') as $slide) {
            $path = $slide->store('product_slides', 'public');
            $slidePaths[] = $path;
        }
        $validatedData['image_slide'] = json_encode($slidePaths);
    }
    

    $product->update($validatedData);
    return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui.');
}

// ... (method destroy dan lainnya tetap sama)
    /**
     * Display the specified resource.
     */
public function show($id, $slug)
{
    $project = Produk::with('kategori')->findOrFail($id);
    $relatedProjects = Produk::where('kategori_id', $project->kategori_id)
                            ->where('id', '!=', $project->id)
                            ->limit(3)
                            ->get();
    $project->image_slide = json_decode($project->image_slide);
    
    return view('page.show', compact('project', 'relatedProjects'));
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
                if ($product->imagebg_produk && Storage::disk('public')->exists($product->imagebg_produk)) {
            Storage::disk('public')->delete($product->imagebg_produk);
        }
                if ($product->image_logo && Storage::disk('public')->exists($product->image_logo)) {
            Storage::disk('public')->delete($product->image_logo);
        }
        if ($product->image_slide) {
    $oldSlides = json_decode($product->image_slide, true);
    foreach ($oldSlides as $oldSlide) {
        if (Storage::disk('public')->exists($oldSlide)) {
            Storage::disk('public')->delete($oldSlide);
        }
    }
}

        $product->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus.');
    }
}
