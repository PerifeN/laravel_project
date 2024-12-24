<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(12); // Pobieranie produktów z bazy
        return view('products.index', compact('products'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
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
        //
        //$product = Product::findOrFail($id); // znajdowanie
        //$product->delete(); // Usuń 
        //
        // Komunikat
        //return redirect()->route('product.index')->with('success', 'Product successfully deleted.');
    }

    public function addToCart($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first to add an item to the basket.');
        }

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => isset($cart[$id]) ? $cart[$id]['quantity'] + 1 : 1,
            "price" => $product->price,
        ];

        session()->put('cart', $cart);

        return redirect()->route('products.index')->with('success', 'Added to basket!');
    }

    public function viewCart()
    {
        // Pobierz koszyk z sesji
        $cart = session()->get('cart', []);

        // Wyślij do widoku
        return view('cart.view', compact('cart'));
    }

    public function removeFromCart($id)
    {
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.view')->with('success', 'Item deleted.');

    }

    public static function getCartItemCount()
    {
        $cart = session()->get('cart', []);
        $count = 0;

        foreach ($cart as $item) {
            $count += $item['quantity'];
        }

        return $count;
    }
    
    public function increaseQuantity($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Added item to basket');
    }

    public function decreaseQuantity($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;

            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Removed item to basket');
    }


}
