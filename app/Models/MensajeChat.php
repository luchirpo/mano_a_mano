<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeChat extends Model
{
    use HasFactory;
    protected $table = 'mensajes_chat';
    protected $fillable = [
        'servicio_id',
        'emisor_id',
        'receptor_id',
        'mensaje',
        'leido',
    ];

    public function servicio()
    {
        return $this->belongsTo(ServicioSolicitado::class,'servicio_id');
    }
    
    public function emisor()
    {
        return $this->belongsTo(User::class,'emisor_id');
    }
    public function receptor()
    {
        return $this->belongsTo(User::class,'receptor_id');
    }
}
