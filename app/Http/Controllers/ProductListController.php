<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products = Product::paginate(10); // Pobranie wszystkich produktów z bazy danych        
        return view('productList.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('productList.create'); // Nazwa widoku
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
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Walidacja obrazu
        ]);
    
        // Obsługa obrazu
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public'); // Zapis do folderu public
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::findOrFail($id); // znajdowanie
        $products->delete(); // Usuń 

        // Komunikat
        return redirect()->route('productList.index')->with('success', 'Product successfully deleted.');
    }

    //
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('productList.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Walidacja danych
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:1000',
            'price' => 'required|numeric',
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

        $product->update($validated);

        return redirect()->route('productList.index')->with('success', 'Product updated successfully.');
    }


    
}
