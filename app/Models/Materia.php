<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Materia — modelo Eloquent.
 *
 * Ahora SÍ extiende Model porque existe la tabla 'materias' en SQLite.
 * Los métodos de negocio (estaAprobada, getEstado, etc.) son IDÉNTICOS a la versión sin BD.
 * La vista Blade no necesita ningún cambio.
 */
class Materia extends Model
{
    protected $fillable = ['nombre', 'codigo', 'creditos', 'nota_obtenida'];

    // Getters — ahora acceden a columnas de BD via Eloquent ($this->nombre = fila de la tabla)
    public function getNombre(): string  { return $this->nombre; }
    public function getCodigo(): string  { return $this->codigo; }
    public function getCreditos(): int   { return $this->creditos; }
    public function getNota(): float     { return $this->nota_obtenida; }

    // Métodos de negocio — IDÉNTICOS a la versión sin BD
    public function estaAprobada(): bool { return $this->nota_obtenida >= 51; }

    public function getEstado(): string
    {
        if ($this->nota_obtenida >= 86) return 'Excelente';
        if ($this->nota_obtenida >= 71) return 'Bueno';
        if ($this->nota_obtenida >= 51) return 'Aprobado';
        return 'Reprobado';
    }

    public function getColorEstado(): string
    {
        return match (true) {
            $this->nota_obtenida >= 86 => '#d4edda',
            $this->nota_obtenida >= 71 => '#d1ecf1',
            $this->nota_obtenida >= 51 => '#fff3cd',
            default                    => '#f8d7da',
        };
    }
}