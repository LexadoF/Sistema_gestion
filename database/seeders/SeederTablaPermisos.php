<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spati
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->delete();
        $permisos=[
            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
            'borrar-usuarios',

            'ver-proyectos',
            'crear-proyectos',
            'editar-proyectos',
            'borrar-proyectos',

            'ver-tareas',
            'crear-tareas',
            'editar-tareas',
            'borrar-tareas',

            'ver-comentarios',
            'crear-comentarios',
            'editar-comentarios',
            'borrar-comentarios',

        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=> $permiso]);
        };
    }
}
