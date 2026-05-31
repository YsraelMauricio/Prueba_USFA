<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- El <title> aparece en la pestaña del navegador -->
    <title>@yield('titulo') — Mi Proyecto</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

    <header>
        <h1>Ysrael Lopez</h1>
        <p class="resaltado"> Ingeniería de Sistemas · Universidad Privada San Francisco de Asís</p>

        <!-- <nav> es la etiqueta semántica para navegación principal -->
        <!-- Los href="#id" navegan a secciones dentro de la misma página -->
        <nav>
            <a href="{{ route('inicio') }}">Inicio</a>
            <a href="{{ route('sobre-mi') }}">Sobre mí</a>
            <a href="{{ route('materias') }}">Materias</a>
            <a href="{{ route('contacto') }}">Contacto</a>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>


    <footer>
        <p class="resaltado">
            &copy; 2026 — Ysrael Mauricio Lopez Rossel ·
            Ingeniería de Sistemas SIS ·
            Universidad Privada San Francisco de Asís
        </p>
        <!-- &copy; es la entidad HTML para el símbolo © -->
    </footer>

</html>