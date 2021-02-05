<?php

use Illuminate\Database\Seeder;
use App\Role;

class CreateUserRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'id' => 1,
            'name' => 'Administrator',
            'description' => 'Manage administration privileges',
            'created_at' => date('Y-m-d H:i:s'),
        ], [
            'id' => 2,
            'name' => 'Doctor',
            'description' => 'Manage doctor privileges',
            'created_at' => date('Y-m-d H:i:s'),
        ], [
            'id' => 3,
            'name' => 'Patient',
            'description' => 'Manage patient privileges',
            'created_at' => date('Y-m-d H:i:s'),
        ], [
            'id' => 4,
            'name' => 'Guest',
            'description' => 'Manage guest users privileges',
            'created_at' => date('Y-m-d H:i:s'),
        ]]);

    }
}
