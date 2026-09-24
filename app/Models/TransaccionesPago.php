<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaccionesPago extends Model
{
    use HasFactory;
    protected $table = 'transacciones';
    protected $fillable = [
        'cotizacion_id',
        'monto',
        'metodo_pago',
        'estado',
        'referencia_pago',
    ];
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class,'cotizacion_id');
    }
}
