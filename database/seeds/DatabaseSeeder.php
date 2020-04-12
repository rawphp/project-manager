<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Model::unguard();

        $this->call(
            [
                RoleSeeder::class,
                PermissionSeeder::class,
                UserSeeder::class,
                ProjectSeeder::class,
                TaskSeeder::class,
            ]
        );

        Model::reguard();
        Schema::enableForeignKeyConstraints();
    }
}
