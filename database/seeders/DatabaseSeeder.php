<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Faker\Core\Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        // Call the manual seeder
        // $this->call(CountriesSeeder::class);

        $this->call(BloodGroupSeeder::class);

        $this->call([
            RoleSeeder::class,
        ]);

        $admin = User::firstOrCreate(["email"=> 'admin@email.com',],[
//                    "first_name"=>'Admin',
                    "email"=> 'admin@email.com',
                    "password"=> Hash::make('admin'),
                ]);

        $admin->assignRole('Admin'); #assigning role

        $patient = User::firstOrCreate(
            ["email"=>'patient@email.com',],
            [
                "first_name"=>'Patient',
                "last_name" => 'Chowdhury',
                "religion"=>'Muslim',
                'gender' => 'male',
                "date_of_birth"=> Carbon::createFromDate(1990, 5, 15),
                "email"=> 'patient@email.com',
                'blood_group_id' => 5,
                "password"=> Hash::make('patient'),

            ],
        );

        $patient->assignRole('Patient'); #assigning role

        $counselor = User::firstOrCreate(
            ["email"=>'counselor@email.com',],
            [
//                "first_name"=>'Counselor',
                "email"=> 'counselor@email.com',
                "password"=> Hash::make('counselor'),
            ],
        );

        $counselor->assignRole('Counselor'); #assigning role


        $doctor = User::firstOrCreate(
            ["email"=>'doctor@email.com',],
            [
//                "first_name"=>'Doctor',
                "email"=> 'doctor@email.com',
                "password"=> Hash::make('doctor'),
            ],
        );

        $doctor->assignRole('Doctor'); #assigning role



//        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
