<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'id' => 1,
            'name' => 'Category A',
            'fee' => 100,
            'created_at' => date('Y-m-d H:i:s'),
        ],[
            'id' => 2,
            'name' => 'Category B',
            'fee' => 200,
            'created_at' => date('Y-m-d H:i:s'),
        ]]);
    }
}
