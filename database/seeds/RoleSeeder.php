<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::truncate();
        DB::table('role_permissions')->truncate();

        $roles = [
            ['id' => 'admin', 'name' => 'Admin', 'description' => 'Gives all permissions.'],
            ['id' => 'user', 'name' => 'User', 'description' => 'Gives basic user permissions.'],
        ];

        foreach ($roles as $role) {
            try {
                Role::create($role);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
