<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::truncate();
        DB::table('user_roles')->truncate();

        $users = [
            User::create([
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]),
            User::create([
                'first_name' => 'Sarah',
                'last_name' => 'Jones',
                'email' => 'sara.jones@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ])
        ];

        $randomUsers = factory(User::class, 10)->create(
            [
                'password' => Hash::make('password'),
            ]
        );

        $allUsers = array_merge($randomUsers->all(), $users);

        foreach ($allUsers as $user) {
            try {
                if ('john.smith@gmail.com' === $user->email) {
                    $user->roles()->attach('admin');
                } else {
                    $user->roles()->attach('user');
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
