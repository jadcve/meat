<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name'		    =>	'Alain',
            'user_lastname'		=>	'Diaz',
            'user_rut'          =>  '26506613-5',
            'user_status'       => '1',
            'email'			    =>  'admin@admin.com',
            'user_phone'        =>  '991364514',
            'password' 		    => bcrypt('admin123'),
            'rol_id'            => '1',
        ]);

        User::create([
            'user_name'		    =>	'Jesus',
            'user_lastname'		=>	'Diaz',
            'user_rut'          =>  '26874896-5',
            'user_status'       =>  '1',
            'email'			    =>  'customer@customer.com',
            'user_phone'        =>  '912345698',
            'password' 		    =>  bcrypt('customer123'),
            'rol_id'            =>  '2',
        ]);
    }
}
