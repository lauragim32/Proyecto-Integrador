@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8 text-center py-5">
        <h1 class="fw-bold text-primary mb-3"><i class="bi bi-building"></i> Bienvenido a CRM IUJO</h1>
        <p class="lead text-muted mb-4">Gestión Integral de Negocios para el sector comercial de Lara.</p>
        <a href="{{ route('clients.index') }}" class="btn btn-lg btn-primary">
            <i class="bi bi-people-fill me-2"></i> Ir a la Cartera de Clientes
        </a>
    </div>
</div>
@endsection
