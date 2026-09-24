@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 fw-bold text-secondary mb-0"><i class="bi bi-people-fill me-2"></i> Cartera de Prospectos y Clientes</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus-fill me-1"></i> Registrar Cliente
    </a>
</div>

<!-- Tarjeta de Buscador y Filtros -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('clients.index') }}" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar por nombre o contacto...">
            </div>
            <div class="col-md-3">
                <select name="zona" class="form-select">
                    <option value="">-- Filtrar por Zona --</option>
                    @foreach(['Oeste', 'Este', 'Cabudare', 'Centro', 'Zona Industrial'] as $zona)
                        <option value="{{ $zona }}" {{ request('zona') == $zona ? 'selected' : '' }}>{{ $zona }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="origin_id" class="form-select">
                    <option value="">-- Filtrar por Origen --</option>
                    @foreach($origins as $origin)
                        <option value="{{ $origin->id }}" {{ request('origin_id') == $origin->id ? 'selected' : '' }}>{{ $origin->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-secondary w-100"><i class="bi bi-search"></i> Buscar</button>
                <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary" title="Limpiar"><i class="bi bi-arrow-counterclockwise"></i></a>
            </div>
        </form>
    </div>
</div>

<!-- Tabla de Clientes -->
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Empresa / Negocio</th>
                        <th>Contacto Principal</th>
                        <th>Zona Geográfica</th>
                        <th>Origen</th>
                        <th>WhatsApp</th>
                        <th class="text-end me-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td class="fw-bold">{{ $client->nombre_empresa }}</td>
                            <td>{{ $client->contacto_principal }}</td>
                            <td><span class="badge bg-info text-dark">{{ $client->zona_geografica }}</span></td>
                            <td><span class="badge bg-secondary">{{ $client->origin->nombre }}</span></td>
                            <td>
                                <a href="https://wa.me/58{{ $client->telefono_whatsapp }}?text=Hola%20{{ urlencode($client->contacto_principal) }}" 
                                   target="_blank" class="btn btn-sm btn-success">
                                    <i class="bi bi-whatsapp"></i> {{ $client->telefono_whatsapp }}
                                </a>
                            </td>
                            <td class="text-end me-3">
                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No hay clientes registrados en el sistema.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">
    {{ $clients->links() }}
</div>
@endsection