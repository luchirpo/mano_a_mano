<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoEmergencia extends Model
{
    use HasFactory;

    protected $table = 'contatos_emergencia';

    protected $fillable = [
        'tecnico_id',
        'nombre_contacto',
        'telefono_contacto',
    ];

    public function tecnico()
    {
        return $this->belongsTo(PerfilTecnico::class,'tecnico_id');
    }
}
