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
        $rol1=Role::create(['name'=>'admin']);
        $rol2=Role::create(['name'=>'usuario']);
        $rol3=Role::create(['name'=>'invitado']);

        Permission::create(['name'=>'admin'])->assignRole($rol1);
        Permission::create(['name'=>'admin.list_users'])->assignRole($rol1);; 
        Permission::create(['name'=>'admin.lista_fotos'])->syncRoles([$rol1,$rol2,$rol3]);
    }
}
