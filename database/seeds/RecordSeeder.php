<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insertGetId([
            'ref_no' => 'AROGYA_REC_1',
            'name' => 'Record 1',
            'date' => '2019-05-26',
            'time' => '12:30 AM',
            'limit' => 10,
            'doctor_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
