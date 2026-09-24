<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $table = 'Calificaciones';
    protected $fillable = [
        'servicio_id',
        'cliente_id',
        'tecnico_id',
        'puntuacion',
        'comentario',
    ];

    public function servicio()
    {
        return $this->belongsTo(ServicioSolicitado::class,'');
    }
    public function cliente()
    {
        return $this->belongsTo(User::class,'cliente_id');
    }
    public function tecnico()
    {
        return $this->belongsTo(PerfilTecnico::class,'tecnico_id');
    }
}
