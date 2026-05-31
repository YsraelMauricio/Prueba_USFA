@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
<section class="perfil-hero">
    <h2>Bienvenido, {{ $nombre }}</h2>
    <h3>Empezando con Git</h2>
    <p>{{ $carrera }} · {{ $semestre }}</p>
    <p>Portafolio académico — {{ $año }}</p>
</section>
@endsection