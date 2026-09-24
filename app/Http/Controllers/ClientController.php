<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Origin;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::with('origin', 'user');

        // Buscador por nombre o contacto
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nombre_empresa', 'like', '%' . $request->search . '%')
                  ->orWhere('contacto_principal', 'like', '%' . $request->search . '%');
            });
        }

        // Filtro por Zona Geográfica
        if ($request->filled('zona')) {
            $query->where('zona_geografica', $request->zona);
        }

        // Filtro por Origen
        if ($request->filled('origin_id')) {
            $query->where('origin_id', $request->origin_id);
        }

        $clients = $query->latest()->paginate(10);
        $origins = Origin::all();

        return view('clients.index', compact('clients', 'origins'));
    }

    public function create()
    {
        $origins = Origin::all();
        return view('clients.create', compact('origins'));
    }

    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id(); // Asigna el usuario autenticado

        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Cliente registrado exitosamente.');
    }

    public function edit(Client $client)
    {
        $origins = Origin::all();
        return view('clients.edit', compact('client', 'origins'));
    }

    public function update(StoreClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
