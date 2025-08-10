<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Faker\Factory::create('id_ID'); // bahasa Indonesia

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('yudha123'),
                'nomorHp'=>fake()->nomorHp,
                'alamat'=>fake()->alamat,
                'kelas_id='=>null,
            ]);
        }
    }
}
