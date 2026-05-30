@extends('layouts.app')
@section('titulo', 'Sobre mí')
@section('contenido')
<h2>Sobre mí</h2>

<div style="display:flex; gap:30px; align-items:flex-start; flex-wrap:wrap; margin-bottom:30px;">
    <img src="https://placehold.co/120x120" alt="Foto de {{ $nombre }}"
         style="width:120px; height:120px; border-radius:50%;
                border:4px solid #1a3c5e; flex-shrink:0;">
    <div style="flex:1; min-width:200px;">
        <h3 style="margin-bottom:8px;">{{ $nombre }}</h3>
        <p style="color:#666; margin-bottom:4px;">{{ $carrera ?? 'Ingeniería de Sistemas' }}</p>
        <p style="color:#666; margin-bottom:12px;">{{ $semestre ?? 'Quinto semestre' }}</p>
        <blockquote style="border-left:3px solid #1a3c5e; padding-left:15px;
                           color:#444; font-style:italic; margin:0;">
            "{{ $motivacion ?? 'Me apasiona resolver problemas reales con código limpio.' }}"
        </blockquote>
    </div>
</div>

@if (!empty($habilidades))
<h3>Habilidades técnicas</h3>
<ul style="list-style:none; padding:0; display:flex; flex-direction:column;
           gap:10px; max-width:400px;">
    @foreach ($habilidades as $habilidad => $nivel)
    <li>
        <div style="display:flex; justify-content:space-between; margin-bottom:4px;">
            <span style="font-weight:600; color:#1a3c5e;">{{ $habilidad }}</span>
            <span style="font-size:0.85rem; color:#666;">{{ $nivel }}%</span>
        </div>
        <div style="background:#e0e0e0; border-radius:4px; height:8px;">
            <div style="background:#1a3c5e; width:{{ $nivel }}%;
                        height:100%; border-radius:4px;"></div>
        </div>
    </li>
    @endforeach
</ul>
@endif
@endsection