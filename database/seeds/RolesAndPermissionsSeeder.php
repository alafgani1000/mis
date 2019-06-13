<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roleEmployee = Role::create(['name' => 'empoloyee']);
        $roleSpt = Role::create(['name' => 'spt mis']);
        $roleMgr = Role::create(['name' => 'mgr mis']);
        $roleBoss = Role::create(['name' => 'boss']);

         /*master*/
         Permission::create(['name' => 'approval']);
         Permission::create(['name' => 'create']);
         Permission::create(['name' => 'reject']);
    }
}
