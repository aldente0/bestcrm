<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;

        return view('orders.index', [
            'orders' => User::find($id)->orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create', [
            'created' => session()->get('created'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product' => 'required|string|max:255|min:2',
            'price' => 'required',
            'quantity' => 'required',
            'client_email' => "required",
        ]);

        $user_id = Auth::user()->id;
        $client_id = Client::where('email', $validated['client_email'])->first()->id;

        $validated['product'] = mb_strtolower($validated['product']);
        $validated['user_id'] = $user_id;
        $validated['client_id'] = $client_id;
        $validated['price'] = $validated['price'] * 100;

        unset($validated['client_email']);

        Order::create($validated);

        return redirect()->route('orders.create')->with(['created' => 1]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // TODO add showing info about 1 order
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->forceDelete();

        return redirect()->route('orders.index');
    }
}
