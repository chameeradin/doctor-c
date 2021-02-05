<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insertGetId([
            'title' => 'Mr',
            'ref_no' => 'AROGYA_PAT_1',
            'first_name' => 'Patient',
            'last_name' => 'Last name',
            'phone' => 071123325,
            'gender' => 'male',
            'age' => 35,
            'user_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
