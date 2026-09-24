<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvidenciaSolicitud extends Model
{
    use HasFactory;

    protected $table = "evidencias_solicitudes";
    protected $fillable = [
        'servicio_id',
        'ruta_archivo',
        'tipo',
    ];
    public function servicio()
    {
        return $this->belongsTo(ServicioSolicitado::class,'servicio_id');
    }
}
