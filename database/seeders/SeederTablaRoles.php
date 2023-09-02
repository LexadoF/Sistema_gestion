<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class SeederTablaRoles extends Seeder
{


    public function run()
    {

        Role::query()->delete();
        $roles = ['Administrador', 'Lider', 'Usuario'];
        foreach ($roles as $rol) {
            Role::create(['name' => $rol]);
        }

        $adminRole = Role::where('name', 'Administrador')->first();
        $adminRole->syncPermissions(Permission::all());

        $leaderRole = Role::where('name', 'Lider')->first();
        $leaderRole->syncPermissions([
            'ver-usuarios',
            'ver-proyectos',
            'ver-tareas',
            'crear-tareas',
            'editar-tareas',
            'borrar-tareas',
            'ver-comentarios',
            'crear-comentarios',
            'editar-comentarios',
        ]);

        $userRole = Role::where('name', 'Usuario')->first();
        $userRole->syncPermissions([
            'ver-usuarios',
            'ver-proyectos',
            'ver-tareas',
            'crear-tareas',
            'editar-tareas',
            'borrar-tareas',
            'ver-comentarios',
            'crear-comentarios',
            'editar-comentarios',
        ]);
    }
}
