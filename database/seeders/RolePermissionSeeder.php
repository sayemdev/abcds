<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role=Role::create([
            'name'=>'Super admin'
        ]);

        $permissions=Permission::all();
        foreach($permissions as $permission)
        {
            RolePermission::create([
                'role_id'=>$role['id'],
                'permission_id'=>$permission['id']
            ]);
        }
    }
}
