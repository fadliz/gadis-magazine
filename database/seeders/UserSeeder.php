<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // Create a specific user with known credentials for testing
        User::factory()->create([
            'username' => 'testuser',
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'picture' => 'images/' . $faker->image('public/storage/images', 640, 480, null, false),
            'password' => bcrypt('password'), // Ensure the password is known for testing
        ]);

        // Create 50 random users
        User::factory()->count(20)->create();
    }
}
