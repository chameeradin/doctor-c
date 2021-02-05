<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insertGetId([
            'title' => 'Mr',
            'ref_no' => 'AROGYA_DOC_1',
            'first_name' => 'Doctor',
            'last_name' => 'Last name',
            'phone' => 071123325,
            'gender' => 'male',
            'user_id' => 2,
            'category_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
