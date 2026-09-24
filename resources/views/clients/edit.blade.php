<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente:') }} {{ $client->nombre_empresa }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('clients.update', $client) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre_empresa" class="form-label font-bold">Nombre de la Empresa o Negocio</label>
                            <input type="text" name="nombre_empresa" id="nombre_empresa" class="form-control @error('nombre_empresa') is-invalid @enderror" value="{{ old('nombre_empresa', $client->nombre_empresa) }}" required>
                            @error('nombre_empresa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="contacto_principal" class="form-label font-bold">Contacto Principal</label>
                            <input type="text" name="contacto_principal" id="contacto_principal" class="form-control @error('contacto_principal') is-invalid @enderror" value="{{ old('contacto_principal', $client->contacto_principal) }}" required>
                            @error('contacto_principal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="telefono_whatsapp" class="form-label font-bold">Teléfono WhatsApp</label>
                            <input type="text" name="telefono_whatsapp" id="telefono_whatsapp" class="form-control @error('telefono_whatsapp') is-invalid @enderror" value="{{ old('telefono_whatsapp', $client->telefono_whatsapp) }}" required>
                            @error('telefono_whatsapp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="zona_geografica" class="form-label font-bold">Zona Geográfica</label>
                                <select name="zona_geografica" id="zona_geografica" class="form-select @error('zona_geografica') is-invalid @enderror" required>
                                    @foreach(['Oeste', 'Este', 'Cabudare', 'Centro', 'Zona Industrial'] as $zona)
                                        <option value="{{ $zona }}" {{ old('zona_geografica', $client->zona_geografica) == $zona ? 'selected' : '' }}>{{ $zona }}</option>
                                    @endforeach
                                </select>
                                @error('zona_geografica')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="origin_id" class="form-label font-bold">Origen</label>
                                <select name="origin_id" id="origin_id" class="form-select @error('origin_id') is-invalid @enderror" required>
                                    @foreach($origins as $origin)
                                        <option value="{{ $origin->id }}" {{ old('origin_id', $client->origin_id) == $origin->id ? 'selected' : '' }}>{{ $origin->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('origin_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>