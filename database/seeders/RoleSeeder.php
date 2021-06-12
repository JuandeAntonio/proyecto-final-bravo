<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREACION DE LOS ROLES Y PERMISOS
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Arbitro']);

        Permission::create(['name' => 'Dashboard'])->assignRole($role1);
        Permission::create(['name' => 'Asignaciones'])->assignRole($role2);
    }
}
