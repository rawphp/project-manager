<?php

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Task::truncate();

        $tasks = [
            [
                'title' => 'Login User',
                'description' => 'As a registered user, I want to be able to login from the UI.',
                'project_id' => 1,
            ]
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }

        $projects = Project::where('id', '!=', 1)->get();

        foreach ($projects as $project) {
            factory(Task::class, 10)->create(
                [
                    'project_id' => $project->id
                ]
            );
        }
    }
}
