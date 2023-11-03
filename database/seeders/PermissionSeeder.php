<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission1 = Permission::create(['name' => 'create-product']);
        $permission2 = Permission::create(['name' => 'show-product']);
        $permission3 = Permission::create(['name' => 'edit-product']);
        $permission4 = Permission::create(['name' => 'delete-product']);
        $role = Role::create(['name' => 'supervisor']);
        $role->givePermissionTo([$permission1, $permission2, $permission3, $permission4]);
        $user = User::find(5);
        $user->assignRole('supervisor');
        // $user->givePermissionTo(['create-order', 'show-order', 'edit-order', 'delete-order']);
    }
}
