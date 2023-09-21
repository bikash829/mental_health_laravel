<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        $admin = User::firstOrCreate(["email"=> 'admin@email.com',],[
                    "name"=>'Admin',
                    "email"=> 'admin@email.com',
                    "password"=> Hash::make('admin'),
                ]);

        $admin->assignRole('Admin'); #assigning role

        $patient = User::firstOrCreate(
            ["email"=>'patient@email.com',],
            [
                "name"=>'Patient',
                "email"=> 'patient@email.com',
                "password"=> Hash::make('patient'),
            ],
        );

        $patient->assignRole('Patient'); #assigning role

        $counselor = User::firstOrCreate(
            ["email"=>'counselor@email.com',],
            [
                "name"=>'Counselor',
                "email"=> 'counselor@email.com',
                "password"=> Hash::make('counselor'),
            ],
        );

        $counselor->assignRole('Counselor'); #assigning role


        $doctor = User::firstOrCreate(
            ["email"=>'doctor@email.com',],
            [
                "name"=>'Doctor',
                "email"=> 'doctor@email.com',
                "password"=> Hash::make('doctor'),
            ],
        );

        $doctor->assignRole('Doctor'); #assigning role



        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
