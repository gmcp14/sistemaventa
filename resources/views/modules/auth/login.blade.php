@extends('layouts.login')
@section('titulo',$titulo)
@section('contenido')
<style>
    /* Estilos para lograr el diseño moderno y glassmorphism */
    .auth-wrapper-custom {
        position: relative;
        min-height: 100vh;
        background: url('{{ asset("img/almacen.jpg") }}') no-repeat center center / cover;
    }
    /* Overlay oscuro sobre el fondo para dar contraste */
    .auth-wrapper-custom::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(15, 23, 42, 0.55); /* Capa oscura semi-transparente */
        backdrop-filter: blur(2px);
        z-index: 1;
    }
    .auth-box-custom {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 420px;
        padding: 40px 30px;
        background: rgba(255, 255, 255, 0.15); /* Transparencia del cristal */
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        color: #ffffff;
    }
    .auth-box-custom .form-control {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid transparent;
        border-radius: 8px;
    }
    .auth-box-custom .input-group-text {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 8px 0 0 8px;
    }
    .auth-box-custom .btn-custom {
        background: linear-gradient(135deg, #007bff, #0056b3);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        transition: all 0.3s ease;
    }
    .auth-box-custom .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 123, 255, 0.45);
    }
</style>

<div class="main-wrapper">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="auth-wrapper-custom d-flex justify-content-center align-items-center">
        <div class="auth-box-custom">
            <div id="loginform">
                <div class="logo text-center mb-3">
                    <!-- Es recomendable que la imagen del logo tenga fondo transparente (PNG) -->
                    <span class="db"><img src="{{ asset('img/logo-2.png') }}" alt="logo" class="img-fluid" style="max-height: 90px; border-radius: 8px;"/></span>
                    <h3 class="font-medium m-t-15 text-white">Ventas y Almacén</h3>
                </div>
                <p class="text-center text-white-50 mb-4">Ingresa tu usuario y contraseña</p>
                
                <form class="form-horizontal" id="loginform" method="POST" action="{{ route('logear') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-user text-dark"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-pencil text-dark"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-lg" placeholder="Contraseña" name="password" required>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-block btn-lg btn-primary btn-custom" type="submit">Iniciar Sesión</button>
                    </div>
                </form>

                @if($errors->any())
                <div class="mt-3">
                    <ul class="pl-3 mb-0">
                        @foreach($errors->all() as $error)
                        <li class="text-warning small">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection