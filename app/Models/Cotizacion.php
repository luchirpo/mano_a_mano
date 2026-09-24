<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';

    protected $fillable= [
        'servicio_id',
        'tecnico_id',
        'monto',
        'propuesta',
        'estado',
    ];

    public function servicio()
    {
        return $this->belongsTo(ServicioSolicitado::class,'servicio_id');
    }
    public function tecnico()
    {
        return $this->belongsTo(PerfilTecnico::class,'tecnico_id');
    }
    public function transaccionPago()
    {
        return $this->hasOne(TransaccionesPago::class, 'cotizacion_id');
    }
}
