<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'hair_id' => Item::query()->where('type', 'hair')->inRandomOrder()->first()->id,
            'face_id' => Item::query()->where('type', 'face')->inRandomOrder()->first()->id,
            'body_id' => Item::query()->where('type', 'body')->inRandomOrder()->first()->id,
            'legs_id' => Item::query()->where('type', 'legs')->inRandomOrder()->first()->id,
            'accessory_id' => Item::query()->where('type', 'accessory')->inRandomOrder()->first()->id,
            'remember_token' => Str::random(10),
        ];
    }
}
