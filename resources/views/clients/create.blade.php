@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h4 class="card-title mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2"></i> Registrar Nuevo Cliente</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre de la Empresa / Negocio</label>
                        <input type="text" name="nombre_empresa" class="form-control @error('nombre_empresa') is-invalid @enderror" value="{{ old('nombre_empresa') }}" required>
                        @error('nombre_empresa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contacto Principal</label>
                        <input type="text" name="contacto_principal" class="form-control @error('contacto_principal') is-invalid @enderror" value="{{ old('contacto_principal') }}" required>
                        @error('contacto_principal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono / WhatsApp (Ej: 4121234567)</label>
                        <input type="text" name="telefono_whatsapp" class="form-control @error('telefono_whatsapp') is-invalid @enderror" value="{{ old('telefono_whatsapp') }}" required>
                        @error('telefono_whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Zona Geográfica</label>
                            <select name="zona_geografica" class="form-select @error('zona_geografica') is-invalid @enderror" required>
                                <option value="">-- Seleccionar --</option>
                                @foreach(['Oeste', 'Este', 'Cabudare', 'Centro', 'Zona Industrial'] as $zona)
                                    <option value="{{ $zona }}" {{ old('zona_geografica') == $zona ? 'selected' : '' }}>{{ $zona }}</option>
                                @endforeach
                            </select>
                            @error('zona_geografica') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Origen / Fuente</label>
                            <select name="origin_id" class="form-select @error('origin_id') is-invalid @enderror" required>
                                <option value="">-- Seleccionar --</option>
                                @foreach($origins as $origin)
                                    <option value="{{ $origin->id }}" {{ old('origin_id') == $origin->id ? 'selected' : '' }}>{{ $origin->nombre }}</option>
                                @endforeach
                            </select>
                            @error('origin_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('clients.index') }}" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Guardar Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection