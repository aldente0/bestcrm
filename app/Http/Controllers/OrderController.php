<?php

namespace App\Http\Controllers;

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
        $orders = [
            [
                'product' => 'шкаф',
                'price' => 1000000,
                'quantity' => 2,
                'user_id' => 1,
                'client_id' => 1,
            ],
            [
                'product' => 'тумба прикроватная',
                'price' => 100000,
                'quantity' => 2,
                'user_id' => 1,
                'client_id' => 1,
            ],
            [
                'product' => 'кровать',
                'price' => 1000000,
                'quantity' => 2,
                'user_id' => 2,
                'client_id' => 2,
            ],
            [
                'product' => 'стол письменный',
                'price' => 200000,
                'quantity' => 2,
                'user_id' => 2,
                'client_id' => 2,
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }

        dd('created');
    }

    public function delete() {
        $orders = Order::withTrashed()->forceDelete();

        foreach ($orders as $order) {
            $order->delete();
        }

        dd('all deleted');
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
    public function destroy()
    {

    }
}
