<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaServicio extends Model
{
    use HasFactory;
    protected $table = 'Categorias_servicios';

    protected $fillable = [
        'servicio_id',
        'tecnico_id',
        'monto',
        'propuesta',
        'estado',
    ];
    public function servicio()
    {
        return $this->hasMany(ServicioSolicitado::class, 'categoria_id');
    }




}
