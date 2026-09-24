<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilTecnico extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'biografia',
        'experiencia_anios',
        'disponible',
];


public function usuario()
{
    return $this->belongsTo(User::class,'use_id');
}


public function ContactoEmergencia()
{
    return $this->hasMany(ContactoEmergencia::class,'tecnico_id');
}


public function categorias()
{
 return $this->hasToMany(CategoriaServicio::class,'categoria_tecnico','tecnico_id','categoria_id');
}


public function cotizaciones()
{
    return $this->hasMany(Cotizacion::class,'tecnico_id');
}

}
