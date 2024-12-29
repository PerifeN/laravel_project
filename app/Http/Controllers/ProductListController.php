<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10); // Pobranie produktów z bazy z paginacją        
        return view('productList.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productList.create'); // Widok formularza dodawania produktu
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:1000',
            'price' => ['required', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        // Obsługa obrazu
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public'); // Zapis obrazu do folderu public
            $validated['image'] = $imagePath;
        }
    
        // Tworzenie produktu
        Product::create($validated);
    
        // Przekierowanie z komunikatem sukcesu
        return redirect()->route('productList.index')->with('success', 'Product has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('productList.show', compact('product')); // Widok szczegółowy
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('productList.edit', compact('product')); // Widok edycji produktu
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Walidacja danych
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:1000',
            'price' => ['required', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Obsługa aktualizacji obrazu
        if ($request->hasFile('image')) {
            if ($product->image) {
                // Usuń stary obraz
                Storage::delete('public/' . $product->image);
            }
            $validated['image'] = $request->file('image')->store('product_images', 'public');
        }

        // Aktualizacja danych produktu
        $product->update($validated);

        // Przekierowanie z komunikatem sukcesu
        return redirect()->route('productList.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Usuń obraz, jeśli istnieje
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // Usuń produkt
        $product->delete();

        // Przekierowanie z komunikatem sukcesu
        return redirect()->route('productList.index')->with('success', 'Product successfully deleted.');
    }
}
