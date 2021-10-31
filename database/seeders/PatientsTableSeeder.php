<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 50000; $i++)
        {
            $data[] = [
                'name' => $faker->name(),
                'mobile_number' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        $chunks = array_chunk($data, 5000);
        foreach ($chunks as $chunk) {
            DB::table('patients')->insert($chunk);
        }
    }
}
