<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'client']);
        $role2 = Role::create(['name' => 'subscriber']);
        $role3 = Role::create(['name' => 'Super-Admin']);

        Permission::create(['name' => 'subscribe']);
        Permission::create(['name' => 'unsubscribe']);

        Permission::create(['name' => 'schedule:create']);
        Permission::create(['name' => 'schedule:delete']);
        Permission::create(['name' => 'schedule:edit']);

        Permission::create(['name' => 'portfolio:create']);
        Permission::create(['name' => 'portfolio:delete']);
        Permission::create(['name' => 'portfolio:edit']);

        $user = User::factory()->create([
            'name' => 'Client',
            'email' => 'client@example.com',
        ]);
        $user->assignRole($role1);

        $user = User::factory()->create([
            'name' => 'Subscriber',
            'email' => 'subscriber@example.com',
        ]);
        $user->assignRole($role2);

        $user = User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}
