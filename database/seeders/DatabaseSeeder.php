<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use \App\Models\TaskUser;
use \App\Models\Task;
use \App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $base = '/images';

        // Hairs
        Item::factory(1)->create(['name' => 'Bald', 'url' => null, 'type' => "hair"]);
        Item::factory(1)->create(['name' => 'Pigtail', 'url' => "$base/hair_pigtail.svg", 'type' => "hair"]);
        Item::factory(1)->create(['name' => 'Hair Male 1', 'url' => "$base/hair_male.svg", 'type' => "hair"]);

        // Faces
        Item::factory(1)->create(['name' => 'Female', 'url' => "$base/face_female.svg", 'type' => "face"]);
        Item::factory(1)->create(['name' => 'Male', 'url' => "$base/face_male.svg", 'type' => "face"]);

        // Bodies
        Item::factory(1)->create(['name' => 'Blue Shirt', 'url' => "$base/shirt_blue.svg", 'type' => "body"]);
        Item::factory(1)->create(['name' => 'Pink Shirt', 'url' => "$base/shirt_pink.svg", 'type' => "body"]);

        // Legs
        Item::factory(1)->create(['name' => 'Shorts', 'url' => "$base/shorts_man.svg", 'type' => "legs"]);
        Item::factory(1)->create(['name' => 'Skirt', 'url' => "$base/skirt_basic.svg", 'type' => "legs"]);

        // Accessories
        Item::factory(1)->create(['name' => 'No Accessory', 'url' => null, 'type' => "accessory"]);
        Item::factory(1)->create(['name' => 'Gold Bangle', 'url' => "$base/bangle_gold.svg", 'type' => "accessory"]);
        Item::factory(1)->create(['name' => 'Watch', 'url' => "$base/accessory_watch.svg", 'type' => "accessory"]);


        $teacher = User::factory(1)->create(['teacher_id' => NULL,
                'name' => 'Dumbledore',
                'email' => 'dumbledore@h',
                'password' => Hash::make('123')]);
        User::factory(1)->create(['teacher_id' => 1,
                'name' => 'Harry',
                'email' => 'harry@h',
                'password' => Hash::make('456')]);

        User::factory(15)->create(['teacher_id' => 1]);

        // Task::factory(1)->create(['user' => 1,
        //         'name' => 'numbers',
        //         'assignment_date' => strtotime('27.09.2020'),
        //         'due_date' => strtotime('30.09.2020')]);

        // TaskUser::factory(1)->create(['user_id' => 1,
        //         'task_id' => 1,
        //         'assignment_date' => strtotime('27.09.2020'),
        //         'finished_date' => NULL]);

   }
}
