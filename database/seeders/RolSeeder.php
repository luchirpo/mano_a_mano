<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([
            'nombre'=> 'Cliente',
            'descripcion'=>'Usuario que solicita servicios para el hogar'
            ]);
            Rol::create([
                'nombre'=>'Tecnico',
                'descripcion' => 'Especialista']);
    }
}
