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
        ]);
    
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

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
    
}
