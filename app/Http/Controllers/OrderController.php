<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class OrderController extends Controller
{

    public function index()
    {
        // Pobieranie wszystkich zamówień z bazy danych, wraz z elementami zamówienia
        $order = Order::paginate(10);
        return view('order.index', compact('order'));
    }

    public function create()
    {
        // Pobierz dane z koszyka
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty.');
        }

        // Oblicz sumę wartości produktów
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        // Przekaż sumę do widoku
        return view('order.create', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        // Tworzenie zamówienia
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'address' => $request->address,
        ]);

        // Dodanie produktów z koszyka do zamówienia
        $cart = session()->get('cart', []);
        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        // Wyczyść koszyk
        session()->forget('cart');

        // Przekierowanie z komunikatem sukcesu
        return redirect()->route('cart.view')->with('success', 'Order has been placed successfully.');
    }

    public function showSummary()
    {
        $cart = session()->get('cart', []);

        // Oblicz sumę wartości produktów
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
    
        //dd($cart, $total);

        // Przekazanie danych do widoku
        return view('cart.view', compact('cart', 'total'));
    } 

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,in progress,shipped,completed',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('order.index')->with('success', 'Order status changed.');
    }

    public function destroy(Order $order)
    {
        // Sprawdź, czy status zamówienia to 'completed'
        if ($order->status === 'completed') {
            $order->delete();
            return redirect()->route('order.index')->with('success', 'Order deleted.');
        }

        return redirect()->route('order.index')->with('error', 'Order is not set as "completed".');
    }

}
