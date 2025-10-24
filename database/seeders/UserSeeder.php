<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@empresa.com',
                'password' => bcrypt('password123'),
                'department_id' => 1, // Recursos Humanos
                'position' => 'Gerente de RRHH'
            ],
            [
                'name' => 'María García',
                'email' => 'maria@empresa.com',
                'password' => bcrypt('password123'),
                'department_id' => 2, // Tecnología de la Información
                'position' => 'Desarrollador Senior'
            ],
            [
                'name' => 'Carlos López',
                'email' => 'carlos@empresa.com',
                'password' => bcrypt('password123'),
                'department_id' => 3, // Contabilidad
                'position' => 'Contador'
            ],
            [
                'name' => 'Ana Martínez',
                'email' => 'ana@empresa.com',
                'password' => bcrypt('password123'),
                'department_id' => 4, // Ventas
                'position' => 'Ejecutiva de Ventas'
            ],
            [
                'name' => 'Luis Rodríguez',
                'email' => 'luis@empresa.com',
                'password' => bcrypt('password123'),
                'department_id' => 2, // Tecnología de la Información
                'position' => 'Soporte Técnico'
            ]
        ];

        foreach ($users as $userData) {
            \App\Models\User::create($userData);
        }
    }
}
