<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\DoctorDepartment;
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

        $admin = User::firstOrCreate(["email" => 'admin@email.com',], [
            "first_name" => 'Admin',
            // "last_name" => 'Doy',
            "email" => 'admin@email.com',
            "password" => Hash::make('admin'),
            'is_active' => 1,
        ]);

        $admin->assignRole('admin'); #assigning role

        $vendor = User::firstOrCreate(
            ["email" => 'vendor@email.com',],
            [
                "first_name" => 'Jhon',
                "last_name" => 'Doy',
                "religion" => 'Muslim',
                'gender' => 'male',
                "date_of_birth" => Carbon::createFromDate(1990, 5, 15),
                "email" => 'vendor@email.com',
                'blood_group_id' => 5,
                "password" => Hash::make('vendor'),
                'is_active' => 1,

            ],
        );

        $vendor->assignRole('vendor'); #assigning role

        $user = User::firstOrCreate(
            ["email" => 'user@email.com',],
            [
                "email" => 'user@email.com',
                "password" => Hash::make('user'),
                'is_active' => 1,
            ],
        );

        $user->assignRole('user'); #assigning role

        $doctor_departments = [
            "Clinical Psychology",
            "Counseling Psychology",
            "School Psychology",
            "Industrial-Organizational Psychology",
            "Health Psychology",
            "Forensic Psychology",
            "Sports Psychology",
            "Neuropsychology",
            "Social Psychology",
            "Developmental Psychology",
            "Experimental Psychology",
            "Cognitive Psychology",
            "Positive Psychology",
            "Environmental Psychology",
            "Consumer Psychology",
        ];

        foreach ($doctor_departments as $doctor_department) {
            DoctorDepartment::firstOrCreate([
                'doctor_department' => $doctor_department,
            ]);
        }


    }
}
