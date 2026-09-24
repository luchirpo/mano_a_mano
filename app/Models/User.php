<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'rol_id',
        'name',
        'email',
        'password',
        'telefono',
        'direccion',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    
    }
    // MIS FUNCIONES (Relaciones eloquent)
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
    public function perfilTecnico()
    {
        return $this->hasOne(PerfilTecnico::class,'user_id');
    }
    public function serviciosSolicitados()
    {
        return $this->hasMany(ServicioSolicitado::class,'cliente_id');
    }
    public function mensajesEnviados()
    {
        return $this->hasMany(MensajeChat::class,'emisor_id');
    }

}