<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;

        return view('clients.index', [
            'clients' => User::find($id)->clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('clients.create', [
            'created' => session()->get('created'),
        ]);
        /* $clients = [
            [
                'name' => 'ООО "Магазин Мебели"',
                'user_id' => 1
            ],
            [
                'name' => 'ООО "Лучшие диваны"',
                'user_id' => 2
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }

        dd('created'); */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $validated = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => "required",
        ]);

        $validated['user_id'] = $user_id;

        Client::create($validated);

        return redirect()->route('clients.create')->with(['created' => 1]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->forceDelete();

        return redirect()->route('clients.index');
    }
}
