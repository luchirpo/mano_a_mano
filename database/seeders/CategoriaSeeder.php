<?php

namespace Database\Seeders;

use App\Models\CategoriaServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Plomería', 'descripcion' =>'Reparacion de fugas, tuberias, grifos.'],
            ['nombre' => 'Jardinería', 'descripcion' =>'Mantenimiento de jardines, poda y césped.'],
            ['nombre' => 'Cerrajería', 'descripcion' =>'Apertura de cerraduras, cambio de llaves y candados.'],
            ['nombre' => 'Electricidad', 'descripcion' =>'Instalacion de tomas, arreglos eléctricos y cortocircuitos.'],
            ];
            foreach ($categorias as $cat){
                CategoriaServicio::create($cat);
                }
    }
}