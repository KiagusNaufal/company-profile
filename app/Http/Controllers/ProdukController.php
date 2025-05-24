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
            'imagebg_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'link_aplikasi' => 'required|string',
            'link_tutorial' => 'required|string',
            'price' => 'required|numeric|min:0',
            'badge_color' => 'nullable|string|max:50',
        'pain_description' => [
            'nullable',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&\:\;\'\"\!\?\/]+$/'
        ],
        'gain_description' => [
            'nullable',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&\:\;\'\"\!\?\/]+$/'
        ],
        'solution_description' => [
            'nullable',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&\:\;\'\"\!\?\/]+$/'
        ],
        'pain_points' => 'sometimes|array',
        'pain_points.*' => [
            'string',
            'max:255',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&]+$/'
        ],
        'gain_points' => 'sometimes|array',
        'gain_points.*' => [
            'string',
            'max:255',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&]+$/'
        ],
        'solution_points' => 'sometimes|array',
        'solution_points.*' => [
            'string',
            'max:255',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&]+$/'
        ],
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produk_images', 'public');
            $validatedData['image'] = '/storage/' . $imagePath;
            $validatedData['image'] = $imagePath;
        }
                if ($request->hasFile('imagebg_produk')) {
            $imagePath = $request->file('imagebg_produk')->store('bg_images', 'public');
            $validatedData['imagebg_produk'] = '/storage/' . $imagePath;
            $validatedData['imagebg_produk'] = $imagePath;
        }
                        if ($request->hasFile('image_logo')) {
            $imagePath = $request->file('image_logo')->store('logo_image', 'public');
            $validatedData['image_logo'] = '/storage/' . $imagePath;
            $validatedData['image_logo'] = $imagePath;
        }
            $validatedData['pain_points'] = array_filter($request->input('pain_points', []));
    $validatedData['gain_points'] = array_filter($request->input('gain_points', []));
    $validatedData['solution_points'] = array_filter($request->input('solution_points', []));

        Produk::create($validatedData);
        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
    }

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
            'link_aplikasi' => 'sometimes|string',
            'link_tutorial' => 'sometimes|string',
        'kategori_id' => 'required|exists:kategori,id',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => [
            'required',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&\:\;\'\"\!\?\/]+$/'
        ],
        'price' => 'required|numeric|min:0|max:100000000',
        'badge_color' => [
            'nullable',
            'string',
            'max:50',
        ],
        'pain_description' => [
            'nullable',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&\:\;\'\"\!\?\/]+$/'
        ],
        'gain_description' => [
            'nullable',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&\:\;\'\"\!\?\/]+$/'
        ],
        'solution_description' => [
            'nullable',
            'string',
            'max:1000',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&\:\;\'\"\!\?\/]+$/'
        ],
        'pain_points' => 'sometimes|array',
        'pain_points.*' => [
            'string',
            'max:255',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&]+$/'
        ],
        'gain_points' => 'sometimes|array',
        'gain_points.*' => [
            'string',
            'max:255',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&]+$/'
        ],
        'solution_points' => 'sometimes|array',
        'solution_points.*' => [
            'string',
            'max:255',
            'regex:/^[a-zA-Z0-9\s\-\_\.\,\(\)\&]+$/'
        ],
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
    if ($request->hasFile('imagebg_produk')) {
        // Delete old image if exists
        if ($product->imagebg_produk && Storage::disk('public')->exists($product->imagebg_produk)) {
            Storage::disk('public')->delete($product->imagebg_produk);
        }
        
        $imagePath = $request->file('imagebg_produk')->store('bg_images', 'public');
        $validatedData['imagebg_produk'] = $imagePath;
    }
        if ($request->hasFile('image_logo')) {
        // Delete old image if exists
        if ($product->image_logo && Storage::disk('public')->exists($product->image_logo)) {
            Storage::disk('public')->delete($product->image_logo);
        }
        
        $imagePath = $request->file('image_logo')->store('bg_images', 'public');
        $validatedData['image_logo'] = $imagePath;
    }
    $validatedData['pain_points'] = array_filter($request->input('pain_points', []));
    $validatedData['gain_points'] = array_filter($request->input('gain_points', []));
    $validatedData['solution_points'] = array_filter($request->input('solution_points', []));


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
