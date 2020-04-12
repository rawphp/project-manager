<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Project::truncate();

        $projects = [
            [
                'name' => 'Project Manager',
                'description' => 'This project aims to create an app to track project tasks.',
                'user_id' => 1,
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $users = User::where('id', '!=', 1)->get();

        foreach ($users as $user) {
            factory(Project::class, 2)->create(
                [
                    'user_id' => $user->id,
                ]
            );
        }
    }
}
