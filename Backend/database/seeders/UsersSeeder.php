<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // User::factory(10)->create();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++){
            User::create([
                'name' => $faker->test,
                'email'=> $faker->testemail
            ]);
        }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
