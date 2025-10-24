<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'Recursos Humanos', 'description' => 'Gestión de personal y administración'],
            ['name' => 'Tecnología de la Información', 'description' => 'Soporte técnico y sistemas'],
            ['name' => 'Contabilidad', 'description' => 'Gestión financiera y contable'],
            ['name' => 'Ventas', 'description' => 'Gestión comercial y clientes'],
            ['name' => 'Marketing', 'description' => 'Promoción y comunicación'],
            ['name' => 'Operaciones', 'description' => 'Gestión operativa y logística'],
            ['name' => 'Atención al Cliente', 'description' => 'Soporte y servicio al cliente'],
            ['name' => 'Administración', 'description' => 'Gestión administrativa general']
        ];

        foreach ($departments as $department) {
            \App\Models\Department::create($department);
        }
    }
}
