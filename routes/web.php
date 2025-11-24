<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Página principal
Route::get('/', function () {
    return view('index');
})->name('inicio');

// Página Sobre Nosotros
Route::get('/about', function () {
    return view('about');
})->name('about');

// Página "Quienes Somos"
Route::get('/somos', function () {
    return view('somos');
})->name('somos');

// Quienes somos privado (requiere login)
Route::get('/somos-privado', function () {
    return view('somos-privado');
})->middleware('auth')->name('somos.privado');

// Página Servicios
Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

// Página Contacto
Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactController::class, 'submit'])->name('contact.submit');

// // Vista de Login
// Route::get('/login', function () {
//     return view('auth.register');
// })->name('login');

// Vista de Registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Página de usuario (requiere login)
Route::get('/usuario', function () {
    return view('index_user');
})->name('usuario');
// ->middleware('auth')
    
Route::get('/logout', function () {
    // Redirige al inicio del sitio, solo para evitar errores
    return redirect()->route('inicio');
})->name('logout');

// Suscripción al boletín
Route::post('/newsletter/subscribe', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
    ]);

    return back()->with('success', '¡Gracias por suscribirte a nuestro boletín!');
    
})->name('newsletter.subscribe');
