@extends('layouts.app')
@section('titulo', 'Contacto')
@section('contenido')
<h2>Formulario de Contacto</h2>

@if ($errors->any())
    <div style="background:#fff3cd; border:1px solid #ffc107; padding:12px 16px;
                border-radius:6px; margin-bottom:20px; color:#856404; font-size:14px;">
        Por favor corrija los errores marcados antes de continuar.
    </div>
@endif

 <form action="{{ route('contacto.procesar') }}" method="POST" style="max-width:480px;">
    @csrf 

    <div style="margin-bottom:16px;">
        <label for="nombre" style="display:block; font-weight:600; color:#1a3c5e;
               margin-bottom:5px; font-size:0.85rem;">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
               placeholder="Tu nombre completo"
               style="width:100%; padding:10px 14px; border:1.5px solid
                      {{ $errors->has('nombre') ? '#dc3545' : '#ccc' }};
                      border-radius:6px; font-size:15px; font-family:inherit;">
        @error('nombre')
            <span style="color:#dc3545; font-size:13px;">⚠ {{ $message }}</span>
        @enderror
    </div>

    <div style="margin-bottom:16px;">
        <label for="email" style="display:block; font-weight:600; color:#1a3c5e;
               margin-bottom:5px; font-size:0.85rem;">Correo electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               placeholder="tu@correo.com"
               style="width:100%; padding:10px 14px; border:1.5px solid
                      {{ $errors->has('email') ? '#dc3545' : '#ccc' }};
                      border-radius:6px; font-size:15px; font-family:inherit;">
        @error('email')
            <span style="color:#dc3545; font-size:13px;">⚠ {{ $message }}</span>
        @enderror
    </div>

    <div style="margin-bottom:20px;">
        <label for="mensaje" style="display:block; font-weight:600; color:#1a3c5e;
               margin-bottom:5px; font-size:0.85rem;">Mensaje</label>
        <textarea id="mensaje" name="mensaje" rows="5"
                  placeholder="Escribe tu mensaje aquí..."
                  style="width:100%; padding:10px 14px; border:1.5px solid
                         {{ $errors->has('mensaje') ? '#dc3545' : '#ccc' }};
                         border-radius:6px; font-size:15px; font-family:inherit;
                         resize:vertical; min-height:100px;">{{ old('mensaje') }}</textarea>
        @error('mensaje')
            <span style="color:#dc3545; font-size:13px;">⚠ {{ $message }}</span>
        @enderror
    </div>

    <button type="submit"
            style="background:#1a3c5e; color:white; padding:12px 28px; border:none;
                   border-radius:20px; cursor:pointer; font-size:15px; font-weight:600;">
        Enviar mensaje
    </button>
</form>
@endsection