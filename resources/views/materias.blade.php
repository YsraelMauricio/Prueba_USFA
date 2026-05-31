@extends('layouts.app')

@section('titulo', 'Mis Materias')

@section('contenido')
<h2>Materias del semestre Mejorado con Git</h2>

<p>
    Promedio general: <strong>{{ $promedio }}</strong> |
    Aprobadas: {{ $aprobadas }}/{{ count($materias) }}
</p>

<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Materia</th>
            <th>Créditos</th>
            <th>Nota</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        {{--
    Diferencia clave respecto al Día 12:
    ANTES: $materia['codigo']  → acceso a índice de array
    AHORA: $m->getCodigo()    → llamada a método de objeto

    La vista no sabe ni le importa cómo se construyó el objeto.
    Eso es encapsulamiento aplicado al MVC.
    --}}
    @foreach ($materias as $m)
        <tr style="background: {{ $m->getColorEstado() }}">
            <td>{{ $m->getCodigo() }}</td>
            <td>{{ $m->getNombre() }}</td>
            <td style="text-align:center;">{{ $m->getCreditos() }}</td>
            <td style="text-align:center; font-weight:bold;">{{ $m->getNota() }}</td>
            <td style="text-align:center; font-weight:bold;">{{ $m->getEstado() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection