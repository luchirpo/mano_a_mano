<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioSolicitado extends Model
{
    use HasFactory;
    
    protected $table='servicio_solicitados';
    
    protected $fillable = [
        'cliente_id',
        'categoria_id',
        'titulo',
        'descripcion',
        'direccion',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }
    
    public function categoria()
    {
        return $this->belongsTo(CategoriaServicio::class,'categoria_id');

    }
    public function evidencias()
    {
        return $this->hasMany(EvidenciaSolicitud::class, 'servicio_id');
    }

    
    
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class,'servicio_id');
    }
    
    

}
