<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;

class SeederTablaUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678'
            ]
        ];

            foreach ($usuarios as $usuario) {
               $user= User::create([
                   'name' => $usuario['name'],
                    'email' => $usuario['email'],
                    'password' => bcrypt($usuario['password'])
                ]);
            }
            $adminRole = Role::where('name', 'Administrador')->first();
            $user->assignRole($adminRole);
    }
}
