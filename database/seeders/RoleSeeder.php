<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Control total del sistema'
        ]);

        Role::create([
            'nombre' => 'Entrenador',
            'descripcion' => 'Gestiona rutinas y seguimiento de usuarios'
        ]);

        Role::create([
            'nombre' => 'Usuario',
            'descripcion' => 'Utiliza el sistema para registrar su progreso'
        ]);
    }
}