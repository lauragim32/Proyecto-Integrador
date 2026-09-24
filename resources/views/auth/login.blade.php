@extends('layouts.guest')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="card-title text-center mb-4 fw-bold">Iniciar Sesión</h4>

                <!-- Estado de Sesión -->
                @if (session('status'))
                    <div class="alert alert-success py-2 mb-3 small">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Errores de Validación -->
                @if ($errors->any())
                    <div class="alert alert-danger py-2 mb-3">
                        <ul class="mb-0 ps-3 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Recordarme -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label small" for="remember_me">Recordar mi sesión</label>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>

                    <div class="text-center mt-3">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none small d-block mb-1">¿Olvidaste tu contraseña?</a>
                        @endif
                        <a href="{{ route('register') }}" class="text-decoration-none small">¿No tienes cuenta? Regístrate</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
