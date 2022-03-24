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
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Mozo']);
        $role3 = Role::create(['name'=>'Cocinero']);

        Permission::create(['name'=>'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.update'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.config'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'admin.config.guardar'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.config.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.config.delete'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.menus.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.menus.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.menus.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.menus.delete'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.entradas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.entradas.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.entradas.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.entradas.delete'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.ordens.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.ordens.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'orden.cobrar'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'orden.mirarid'])->syncRoles([$role1, $role2, $role3]);

    }
}
