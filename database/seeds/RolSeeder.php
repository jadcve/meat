<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'rol_name' => 'Admin',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'rol_name' => 'Customer',
            'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
    }
}
