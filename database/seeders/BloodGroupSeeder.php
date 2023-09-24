<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('blood_groups')->insert([
            ['group' => 'A+','created_at'=>now(),],
            ['group' => 'A+','created_at'=>now()],
//            ['group' => 'A-'],
//            ['group' => 'B+'],
//            ['group' => 'B-'],
//            ['group' => 'AB+'],
//            ['group' => 'AB-'],
//            ['group' => 'O+'],
//            ['group' => 'O-'],
        ]);
//        BloodGroup::insert([
//            ['group' => 'A+'],
//            ['group' => 'A-'],
//            ['group' => 'B+'],
//            ['group' => 'B-'],
//            ['group' => 'AB+'],
//            ['group' => 'AB-'],
//            ['group' => 'O+'],
//            ['group' => 'O-'],
//        ]);
    }
}
