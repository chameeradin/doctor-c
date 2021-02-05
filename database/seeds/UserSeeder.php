<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        $adminId = DB::table('users')->insertGetId([
            'first_name' => 'Admin',
            'last_name' => 'Last Name',
            'email' => 'admin@arogya.lk',
            'password' => bcrypt('admin@123'),
            'role_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        //Doctor
        $doctorId = DB::table('users')->insertGetId([
            'first_name' => 'Doctor',
            'last_name' => 'Last Name',
            'email' => 'doctor@arogya.lk',
            'password' => bcrypt('doctor@123'),
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        //Patient
        $patientId = DB::table('users')->insertGetId([
            'first_name' => 'Patient',
            'last_name' => 'Last Name',
            'email' => 'patient@arogya.lk',
            'password' => bcrypt('patient@123'),
            'role_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        //New users
        $guestId = DB::table('users')->insertGetId([
            'first_name' => 'Guest',
            'last_name' => 'Last Name',
            'email' => 'guest@arogya.lk',
            'password' => bcrypt('guest@123'),
            'role_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
