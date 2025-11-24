@extends('layouts.app')

@section('title', 'Login y Registro')

@section('styles')
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('fonts1/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('fonts1/iconic/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('css1/util.css') }}">
<link rel="stylesheet" href="{{ asset('css1/main.css') }}">
@endsection

@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{ asset('images1/01.jpg') }}');">

        {{-- FORMULARIO LOGIN --}}
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" id="formLogin">
            <form class="login100-form validate-form" action="#" method="POST">
                @csrf

                <span class="login100-form-title p-b-49">
                    Iniciar Sesión
                </span>

                <div class="wrap-input100 validate-input m-b-23">
                    <span class="label-input100">Correo Electrónico</span>
                    <input class="input100" type="text" name="email" placeholder="Correo Electrónico o Teléfono" required>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Contraseña</span>
                    <input class="input100" type="password" name="password" placeholder="Introduce tu contraseña" required>
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">Ingresar</button>
                    </div>
                </div>

                <div class="txt1 text-center p-t-54 p-b-20">
                    <span>O regístrate utilizando</span>
                </div>

                <div class="flex-c-m">
                    <a href="#" class="login100-social-item bg1"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="login100-social-item bg2"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="login100-social-item bg3"><i class="fa fa-google"></i></a>
                </div>

                <div class="flex-col-c p-t-155">
                    <span class="txt1 p-b-17">O puede crear una cuenta</span>

                    <a href="#" class="txt2 registro" id="crearCuenta">Crear Cuenta</a>

                    <a href="{{ url('/') }}" class="txt2 registro">Home</a>
                </div>

            </form>
        </div>

        {{-- FORMULARIO REGISTRO --}}
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" id="formReg" style="display:none;">
            <form id="registroForm" class="login100-form validate-form" method="POST" action="#" novalidate>
                @csrf

                <span class="login100-form-title p-b-49">Registro</span>

                <table>
                    <tr>
                        <td>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Nombre</span>
                                <input id="nombre" class="input100" type="text" name="name" placeholder="Ingrese su nombre">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                                <div class="error" id="errorNombre"></div>
                            </div>
                        </td>

                        <td>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Apellidos</span>
                                <input id="apellidos" class="input100" type="text" name="lastname" placeholder="Ingrese apellidos">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                                <div class="error" id="errorApellidos"></div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Correo electrónico</span>
                                <input id="usuario" class="input100" type="email" name="email" placeholder="ejemplo@correo.com" required>
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                                <div class="error" id="errorUsuario"></div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Contraseña</span>
                                <input id="clave" class="input100" type="password" name="password" placeholder="Introduce tu contraseña">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                                <div class="error" id="errorClave"></div>
                            </div>
                        </td>

                        <td>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Confirmación</span>
                                <input id="confirmar" class="input100" type="password" name="password_confirmation" placeholder="Confirma tu contraseña">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                                <div class="error" id="errorConfirmar"></div>
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="container-login100-form-btn" id="reg">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit">Registrarme</button>
                    </div>
                </div>

                <div class="txt1 text-center p-t-54 p-b-20">
                    <a href="#" class="registro" id="cerrarRegistro">Prefiero iniciar sesión</a>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
// Mostrar Registro
document.getElementById("crearCuenta").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("formLogin").style.display = "none";
    document.getElementById("formReg").style.display = "block";
});

// Volver al Login
document.getElementById("cerrarRegistro").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("formReg").style.display = "none";
    document.getElementById("formLogin").style.display = "block";
});
</script>

<script src="{{ asset('js1/jquery-latest.js') }}"></script>
<script src="{{ asset('js1/registro.js') }}"></script>
<script src="{{ asset('js/validacionRegistro.js') }}"></script>

<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
@endsection
