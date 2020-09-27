<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use \App\Models\TaskUser;
use \App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $teacher = User::factory(1)->create(['teacher_id' => NULL, 
                'name' => 'Dumbledore', 
                'email' => 'dumbledore@h', 
                'password' => Hash::make('123')]);
        User::factory(1)->create(['teacher_id' => 1, 
                'name' => 'Harry', 
                'email' => 'harry@h',
                'password' => Hash::make('456')]);

        Task::factory(1)->create(['user' => 1, 
                'name' => 'numbers', 
                'assignment_date' => strtotime('27.09.2020'),
                'due_date' => strtotime('30.09.2020')]);

        TaskUser::factory(1)->create(['user_id' => 1,
                'task_id' => 1,
                'assignment_date' => strtotime('27.09.2020'),
                'finished_date' => NULL]);
    }
}
